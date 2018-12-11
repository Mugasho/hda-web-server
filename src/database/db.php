<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 9/30/2018
 * Time: 10:19 PM
 */

namespace database;


class db
{
    public $db_host;
    public $db_user;
    public $db_pass;
    public $db_name;
    public $db_prefix;
    public $mysqli;

    /**
     * db constructor.
     * @internal param $db_host
     * @internal param $db_user
     * @internal param $db_pass
     * @internal param $db_name
     * @internal param $prefix
     * @internal param $host
     * @internal param $user
     * @internal param $pass
     * @internal param $database
     */
    public function __construct()
    {

        $this->db_prefix = DB_PREFIX;
        if (DB_DATABASE != null) {
            $mysqli = new \mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die("Cannot connect to " . DB_DATABASE . " at " . DB_HOST);
        } else {
            $mysqli = new \mysqli(DB_HOST, DB_USER, DB_PASSWORD) or die("Cannot connect to " . DB_HOST);
        }
        $this->mysqli = $mysqli;
        return $mysqli;
    }

    public function connect()
    {
        $this->mysqli->prepare();
    }

    function createTables()
    {
        //create users table
        $this->mysqli->query("CREATE TABLE IF NOT EXISTS users(id int(11) primary key auto_increment,
        unique_id varchar(23) not null unique,name varchar(50) not null,email varchar(100) not null unique,
        encrypted_password varchar(80) not null,salt varchar(10) not null,created_at datetime,updated_at datetime null,
        status int(1) DEFAULT '0' ,role INT (1) DEFAULT '0' )");

        //create drugs table
        $this->mysqli->query("CREATE TABLE  IF NOT EXISTS drugs (sn int(4) DEFAULT NULL,nda_registration_no varchar(16) DEFAULT NULL,
        license_holder varchar(81) DEFAULT NULL,
        local_technical_representative varchar(46) DEFAULT NULL,
        name_of_drug varchar(85) DEFAULT NULL,
        generic_name_of_drug varchar(199) DEFAULT NULL,
        strength_of_drug varchar(101) DEFAULT NULL,
        manufacturer varchar(255) DEFAULT NULL,
        country_of_manufacture varchar(20) DEFAULT NULL,
        dosage_form varchar(54) DEFAULT NULL,
        pack_size varchar(255) DEFAULT NULL) ");

        // create facilities table
        $this->mysqli->query("CREATE TABLE IF NOT EXISTS facilities (id INTEGER(11) NOT NULL AUTO_INCREMENT,
	                    name	TEXT,address	TEXT,sector	TEXT,category	TEXT,created_at	TEXT,PRIMARY KEY(id))");

        $this->mysqli->query("CREATE TABLE IF NOT EXISTS batch (
	                                id	INTEGER(11) AUTO_INCREMENT,batchno	TEXT,drug_id	TEXT,made	TEXT,expiry	TEXT,
	                                reason	TEXT,created_at	TEXT,PRIMARY KEY(id));");
    }

    /**
     * Storing new user
     * returns user details
     * @param $name
     * @param $email
     * @param $password
     * @return array
     */
    public function storeUser($name, $email, $password)
    {
        $uuid = $this->getUUID();
        $hash = $this->hashSSHA($password);
        $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"]; // salt

        $stmt = $this->mysqli->prepare("INSERT INTO users(unique_id, name, email, encrypted_password, salt, created_at) VALUES(?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("sssss", $uuid, $name, $email, $encrypted_password, $salt);
        $result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            $results = $this->mysqli->query("SELECT * FROM users WHERE email ='".$email."'");
            $user = $results->fetch_assoc();
            $stmt->close();
        }
        if (!empty($user)) {
            return $user;
        }
    }

    /**
     * Get user by email and password
     * @param $email
     * @param $password
     * @return null
     */
    public function getUserByEmailAndPassword($email, $password)
    {
        $user=null;
        $results = $this->mysqli->query("SELECT * FROM users WHERE email ='".$email."'");
        $user = $results->fetch_assoc();
        if (!is_null($user)) {

            $results->close();

            // verifying user password
            $salt = $user['salt'];
            $encrypted_password = $user['encrypted_password'];
            $hash = $this->checkhashSSHA($salt, $password);
            // check for password equality
            if ($encrypted_password == $hash) {
                // user authentication details are correct
                // Get the user-agent string of the user.
                $user_browser = $_SERVER['HTTP_USER_AGENT'];
                // XSS protection as we might print this value
                $user_id = $user['unique_id'];
                $_SESSION['user_id'] = $user_id;
                // XSS protection as we might print this value
                $username = preg_replace("/[^a-zA-Z0-9_\-]+/",
                    "",
                    $user['name']);
                $_SESSION['timestamp'] = time();
                $_SESSION['username'] = $username;
                $_SESSION['login_string'] = hash('sha512',
                    $user['encrypted_password'] . $user_browser);
                return $user;
            }
        } else {
            return NULL;
        }
    }

    /**
     * Get a drug by id
     * @param $id
     * @return array|null
     */
    public function getDrugByID($id)
    {
        $drug=$this->mysqli->query("SELECT * FROM drugs WHERE id = $id")->fetch_assoc();
        return !is_null($drug)?$drug:null;
    }
    /**
     * Check if user is exists
     */
    public function isUserExisted($email)
    {
        $stmt = $this->mysqli->prepare("SELECT email from users WHERE email = ?");

        $stmt->bind_param("s", $email);

        $stmt->execute();

        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // user existed
            $stmt->close();
            return true;
        } else {
            // user not existed
            $stmt->close();
            return false;
        }
    }

    /**
     * Encrypting password
     * @param password
     * returns salt and encrypted password
     * @return array
     */
    public function hashSSHA($password)
    {

        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);
        return $hash;
    }

    /**
     * Decrypting password
     * @param $salt
     * @param $password
     * @return string
     * @internal param $salt , password
     * returns hash string
     */
    public function checkhashSSHA($salt, $password)
    {

        $hash = base64_encode(sha1($password . $salt, true) . $salt);

        return $hash;
    }

    /**
     * Generate a unique user id
     * @param int $length
     * @return bool|string
     * @throws Exception
     */
    function getUUID($length = 15)
    {
        // 15 digit Cryptographically Secure Pseudo-random Number
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($length / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($length / 2));
        } else {
            $bytes = uniqid('', true);
        }
        return substr(bin2hex($bytes), 0, $length);
    }

    /**
     *Starts a php session
     */
    function start_session()
    {
        $session_name = 'sec_session_id';   // Set a custom session name
        /*Sets the session name.
         *This must come before session_set_cookie_params due to an undocumented bug/feature in PHP.
         */
        session_name($session_name);

        $secure = true;
        // This stops JavaScript being able to access the session id.
        $httponly = true;
        // Forces sessions to only use cookies.
        if (ini_set('session.use_only_cookies', 1) === FALSE) {
            header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
            exit();
        }
        // Gets current cookies params.
        $cookieParams = session_get_cookie_params();
        /*session_set_cookie_params($cookieParams["lifetime"],
            $cookieParams["path"],
            $cookieParams["domain"],
            $secure,
            $httponly);*/

        session_start();            // Start the PHP session
        session_regenerate_id(true);    // regenerated the session, delete the old one.
    }

    /**
     * Check whether user is logged in
     * @return bool
     */
    function login_check()
    {
        // Check if all session variables are set
        if (isset($_SESSION['user_id'],
            $_SESSION['username'],
            $_SESSION['login_string'])) {

            $user_id = $_SESSION['user_id'];
            $login_string = $_SESSION['login_string'];
            // Get the user-agent string of the user.
            $user_browser = $_SERVER['HTTP_USER_AGENT'];

            if ($stmt = $this->mysqli->prepare("SELECT encrypted_password 
                                      FROM users 
                                      WHERE unique_id = ? LIMIT 1")) {
                // Bind "$user_id" to parameter.
                $stmt->bind_param('i', $user_id);
                $stmt->execute();   // Execute the prepared query.
                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    // If the user exists get variables from result.
                    $stmt->bind_result($password);
                    $stmt->fetch();
                    $login_check = hash('sha512', $password . $user_browser);


                    if (hash_equals($login_check, $login_string)) {
                        // Logged In!!!!
                        return true;
                    } else {
                        // Not logged in
                        return false;
                    }


                } else {
                    // Not logged in
                    return false;
                }
            } else {
                // Not logged in
                return false;
            }
        } else {
            // Not logged in
            return false;
        }
    }

    /**
     * Get all users
     * @return array|bool
     */
    public function getAllUsers()
    {
        $results = $this->mysqli->query("SELECT * FROM users");
        $allUsers = array();
        while ($user = $results->fetch_assoc()) {
            $allUsers[] = $user;
        }
        return !is_null($allUsers)?$allUsers:false;
    }

    /**
     * @param $limit
     * @param $begin
     * @return array|bool
     */
    public function getAllDrugs($limit, $begin,$search)
    {
        $start='';
        $to_search='';
        $to_limit='';
        if ($limit != null) {$to_limit="  LIMIT ". $limit;}
        if ($begin != null) {$start=' WHERE id >'.$begin;}
        if($search!=null){$to_search=" WHERE name_of_drug LIKE '%".$search."%' ";}
        $result=$this->mysqli->query('SELECT * FROM drugs '.$start.$to_search.$to_limit);
        $allDrugs=array();
        while ($drug = $result->fetch_assoc()) {
            $allDrugs[] = $drug;
        }
        return !is_null($allDrugs)?$allDrugs:false;

    }

    public function getAllFacilities($limit, $begin,$search)
    {
        $start='';
        $to_search='';
        if ($limit == null) {$limit=20;}
        if ($begin != null) {$start=' WHERE id >'.$begin;}
        if($search!=null){$to_search=" WHERE name LIKE '%".$search."%' ";}
        $result=$this->mysqli->query("SELECT * FROM facilities ".$start.$to_search."  LIMIT ". $limit);
        $allFacilities = array();
        while ($facility= $result->fetch_assoc()) {
            $allFacilities[] = $facility;
        }
        return !is_null( $allFacilities)?$allFacilities:false;
    }

    /**Return batch numbers from search query
     * @param $limit
     * @param $drug_id
     * @param $search
     * @return array|bool
     */
    public function getAllBatch($limit, $drug_id, $search)
    {
        if ($limit == null) {$limit=20;}
        $id=!is_null($drug_id)?' WHERE drug_id ='.$drug_id:'';
        $to_search=!is_null($search)?" WHERE batchno LIKE '%".$search."%' ":'';
        $stmt = $this->mysqli->query("SELECT * FROM batch ".$id.$to_search."  LIMIT ". $limit);
        $allBatch=array();
        while($batch=$stmt->fetch_assoc()){
            $allBatch[]=$batch;
        }
        return !is_null($allBatch)?$allBatch:false;

    }

    public function addDrug($drug)
    {

        $stmt = $this->mysqli->prepare("INSERT INTO drugs(nda_registration_no,license_holder ,
        local_technical_representative ,name_of_drug ,generic_name_of_drug ,strength_of_drug ,
        manufacturer ,country_of_manufacture,dosage_form,pack_size) VALUES(?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssssss", $drug[0],$drug[1],$drug[2],$drug[3],$drug[4],$drug[5],
            $drug[6],$drug[7],$drug[8],$drug[9]);
        $result = $stmt->execute();
        $stmt->close();

        return $result?true:false;
    }

    /**
     * Gets last inserted row id
     * @param $table_name
     * @return null
     */
    public function getLastID($table_name){
        $stmt=$this->mysqli->prepare("SELECT id FROM ".$table_name." WHERE id=(SELECT MAX(id) FROM ".$table_name.")");
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id);
        return !is_null($id)?$id:null;
    }

    function countDrugs(){
        $stmt = $this->mysqli->prepare("SELECT * FROM drugs");
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows;
    }

    function countFacility(){
        $stmt = $this->mysqli->prepare("SELECT * FROM facilities");
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows;
    }
    /**
     * Reduce word length
     * @param $text
     * @param $maxchar
     * @param string $end
     * @return string
     */
    function limitChars($text, $maxchar, $end='...') {
        if (strlen($text) > $maxchar || $text == '') {
            $words = preg_split('/\s/', $text);
            $output = '';
            $i      = 0;
            while (1) {
                $length = strlen($output)+strlen($words[$i]);
                if ($length > $maxchar) {
                    break;
                }
                else {
                    $output .= " " . $words[$i];
                    ++$i;
                }
            }
            $output .= $end;
        }
        else {
            $output = $text;
        }
        return $output;
    }

    function registerMobile(){
        // json response array
        $response = array("error" => FALSE);

        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
            // receiving the post params
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            //return if parameters are null
            if($name==null||$email==null||$password==null){
                $response["error"] = TRUE;
                $response["error_msg"] = "Required parameters (name, email or password) is missing!";
                echo json_encode($response);
                return;
            }

            // check if user is already existed with the same email
            if ($this->mysqli->isUserExisted($email)) {
                // user already existed
                $response["error"] = TRUE;
                $response["error_msg"] = "User already existed with " . $email;
                echo json_encode($response);
            } else {
                // create a new user
                $user = $this->mysqli->storeUser($name, $email, $password);
                if ($user) {
                    // user stored successfully
                    $response["error"] = FALSE;
                    $response["uid"] = $user["unique_id"];
                    $response["user"]["name"] = $user["name"];
                    $response["user"]["email"] = $user["email"];
                    $response["user"]["created_at"] = $user["created_at"];
                    $response["user"]["updated_at"] = $user["updated_at"];
                    echo json_encode($response);
                } else {
                    // user failed to store
                    $response["error"] = TRUE;
                    $response["error_msg"] = "Unknown error occurred in registration!";
                    echo json_encode($response);
                }
            }
        } else {
            $response["error"] = TRUE;
            $response["error_msg"] = "Required parameters (name, email or password) is missing!";
            echo json_encode($response);
        }
    }

    function loginMobile(){
        // json response array
        $response = array("error" => FALSE);

        if (isset($_POST['email']) && isset($_POST['password'])) {

            // receiving the post params
            $email = $_POST['email'];
            $password = $_POST['password'];

            // get the user by email and password
            $user = $this->mysqli->getUserByEmailAndPassword($email, $password);

            if ($user != false) {
                // use is found
                $response["error"] = FALSE;
                $response["uid"] = $user["unique_id"];
                $response["user"]["name"] = $user["name"];
                $response["user"]["email"] = $user["email"];
                $response["user"]["created_at"] = $user["created_at"];
                $response["user"]["updated_at"] = $user["updated_at"];
                echo json_encode($response);
            } else {
                // user is not found with the credentials
                $response["error"] = TRUE;
                $response["error_msg"] = "Login credentials are wrong. Please try again!";
                echo json_encode($response);
            }
        } else {
            // required post params is missing
            $response["error"] = TRUE;
            $response["error_msg"] = "Required parameters email or password is missing!";
            echo json_encode($response);
        }
    }
}