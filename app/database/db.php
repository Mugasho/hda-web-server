<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 9/30/2018
 * Time: 10:19 PM
 */

namespace Hda\database;


use Hda\models\Batch;

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

    /**
     *Auto generate database tables
     */
    function createTables()
    {

        $this->mysqli->query("CREATE TABLE IF NOT EXISTS users(id int(11) primary key auto_increment,
        unique_id varchar(23) not null unique,name varchar(50) not null,email varchar(100) not null unique,
        phone varchar(100) not null unique,encrypted_password varchar(80) not null,salt varchar(10) not null,created_at datetime,updated_at datetime null,
        status int(1) DEFAULT '0' ,role INT (1) DEFAULT '0' )");

        $this->mysqli->query("CREATE TABLE  IF NOT EXISTS drugs (sn int(4) DEFAULT NULL,
        nda_registration_no varchar(16) DEFAULT NULL,
        license_holder varchar(81) DEFAULT NULL,
        local_technical_representative varchar(46) DEFAULT NULL,
        name_of_drug varchar(85) DEFAULT NULL,
        generic_name_of_drug varchar(199) DEFAULT NULL,
        strength_of_drug varchar(101) DEFAULT NULL,
        manufacturer varchar(255) DEFAULT NULL,
        country_of_manufacture varchar(20) DEFAULT NULL,
        dosage_form varchar(54) DEFAULT NULL,
        pack_size varchar(255) DEFAULT NULL) ");

        $this->mysqli->query("CREATE TABLE IF NOT EXISTS drug_details (id int NOT NULL,drugID int,
        description TEXT,pharmacology TEXT,administration TEXT,indications TEXT,INTERACTIONS TEXT,
        pregnancy TEXT,side_effects TEXT,precautions TEXT, storage TEXT,advice TEXT,
        PRIMARY KEY (id),FOREIGN KEY (drugID) REFERENCES drugs(id));");

        $this->mysqli->query("CREATE TABLE IF NOT EXISTS facilities (id INTEGER(11) NOT NULL AUTO_INCREMENT,
	                    facility varchar(50) NOT NULL ,address TEXT,sector varchar(50),category varchar(50),license varchar(50),
	                    contact varchar(50),phone varchar(50),email varchar(50),qualification varchar(50),
	                    location varchar(100), created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,PRIMARY KEY(id))");

        $this->mysqli->query("CREATE TABLE IF NOT EXISTS doctors (id INT(11) NOT NULL AUTO_INCREMENT,
                                      surname varchar(50) NOT NULL, 
                                      first_name varchar(50) NOT NULL, 
                                      other_names varchar(50) NOT NULL, 
                                      title VARCHAR(50),
                                      email VARCHAR(50),
                                      phone VARCHAR(50),
                                      address VARCHAR(100),
                                      reg_no VARCHAR(50),
                                      qualification VARCHAR(100),
                                      council VARCHAR(50),
                                      license VARCHAR(50),
                                      reg_date VARCHAR(50),
                                      status VARCHAR(50),
                                      notes VARCHAR(500),
                                      profile_pic VARCHAR(200),
                                      institution VARCHAR(200),
                                      nationality VARCHAR(200),
                                      date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,PRIMARY KEY(id))");

        $this->mysqli->query("CREATE TABLE IF NOT EXISTS members (id INT(11) NOT NULL AUTO_INCREMENT,
                                      hw_id int(11) NOT NULL,position VARCHAR(50),
                                      date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,PRIMARY KEY(id),
                                      FOREIGN KEY (hw_id) REFERENCES doctors(id))");

        $this->mysqli->query("CREATE TABLE IF NOT EXISTS batch (
	                                id	INTEGER(11) AUTO_INCREMENT,batchno	varchar(30) NOT NULL UNIQUE ,drug_id int(11) NOT NULL ,made	TEXT,expiry	TEXT,
	                                reason	TEXT,created_at	TIMESTAMP  DEFAULT CURRENT_TIMESTAMP,PRIMARY KEY(id),FOREIGN KEY (drug_id) REFERENCES drugs(id));");
        $this->mysqli->query("CREATE TABLE IF NOT EXISTS facility_detail(
                                        id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
                                        hw_id int NOT NULL,
                                        facility_id int NOT NULL,
                                        position VARCHAR(30),
                                        date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                                        FOREIGN KEY (hw_id) REFERENCES doctors(id) )");

        $this->mysqli->query("CREATE TABLE IF NOT EXISTS section_titles(id int(11) primary key auto_increment,
                                    facility_id int NOT NULL, section_title varchar(50) not null,
                                    status varchar(11) DEFAULT 'public',created_at	TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                                    updated_at TIMESTAMP,FOREIGN KEY (facility_id) REFERENCES facilities(id))");

        $this->mysqli->query("CREATE TABLE IF NOT EXISTS section_content(id int(11) primary key auto_increment,
                                    facility_id int NOT NULL,section_id int NOT NULL, sub_title varchar(50) not null,
                                    content Text ,created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                                    updated_at TIMESTAMP,FOREIGN KEY (facility_id) REFERENCES facilities(id))");

        $this->mysqli->query("CREATE TABLE IF NOT EXISTS trainings(
                                        id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
                                        hw_id int NOT NULL,
                                        type int NOT NULL,
                                        award VARCHAR(100) NOT NULL ,
                                        school VARCHAR(100) NOT NULL ,
                                        started VARCHAR(30),
                                        ended VARCHAR(30),
                                        notes VARCHAR(500),
                                        date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                                        FOREIGN KEY (hw_id) REFERENCES doctors(id) )");
    }

    /**
     * Storing new user
     * returns user details
     * @param $name
     * @param $email
     * @param $phone
     * @param $password
     * @return array
     * @throws \Exception
     */
    public function storeUser($name, $email, $phone, $password)
    {
        $uuid = $this->getUUID();
        $hash = $this->hashSSHA($password);
        $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"]; // salt

        $stmt = $this->mysqli->prepare("INSERT INTO users(unique_id, name, email,phone, encrypted_password, salt, created_at) VALUES(?, ?, ?,?, ?, ?, NOW())");
        $stmt->bind_param("ssssss", $uuid, $name, $email, $phone, $encrypted_password, $salt);
        $result = $stmt->execute();
        // check for successful store
        if ($result) {
            $results = $this->mysqli->query("SELECT * FROM users WHERE email ='" . $email . "'");
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
        $user = null;
        $results = $this->mysqli->query("SELECT * FROM users WHERE email ='" . $email . "'");
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
                $username = preg_replace("/[^a-zA-Z0-9_\-]+/", " ", $user['name']);
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
     * @throws \Exception
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

    public function hasAccess($login)
    {
        if (!$login == true) {
            header('Location:' . ADMIN_PATH . 'login/?return=' . ROUTE);
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
        return !is_null($allUsers) ? $allUsers : false;
    }

    /**
     * Return list of drugs
     * @param $limit
     * @param $begin
     * @param $search
     * @return array|bool
     */
    public function getAllDrugs($limit, $begin, $search)
    {
        $start = '';
        $to_search = '';
        $to_limit = '';
        if ($limit != null) {
            $to_limit = "  LIMIT " . $limit;
        }
        if ($begin != null) {
            $start = ' WHERE id >' . $begin;
        }
        if ($search != null) {
            $to_search = " WHERE name_of_drug LIKE '%" . $search . "%' OR strength_of_drug LIKE '%"
                . $search . "%' OR local_technical_representative LIKE '%"
                . $search . "%' OR country_of_manufacture LIKE '%" . $search . "%'";
        }
        $result = $this->mysqli->query('SELECT * FROM drugs ' . $start . $to_search . $to_limit);
        $allDrugs = array();
        while ($drug = $result->fetch_assoc()) {
            $allDrugs[] = $drug;
        }
        return !is_null($allDrugs) ? $allDrugs : false;

    }

    public function addDrug($drug)
    {

        $stmt = $this->mysqli->prepare("INSERT INTO drugs(nda_registration_no,license_holder ,
        local_technical_representative ,name_of_drug ,generic_name_of_drug ,strength_of_drug ,
        manufacturer ,country_of_manufacture,dosage_form,pack_size) VALUES(?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssssss", $drug[0], $drug[1], $drug[2], $drug[3], $drug[4], $drug[5],
            $drug[6], $drug[7], $drug[8], $drug[9]);
        $result = $stmt->execute();
        $stmt->close();

        return $result ? true : false;
    }

    /**
     * Get a drug by id
     * @param $id
     * @return array|null
     */
    public function getDrugByID($id)
    {
        $drug = $this->mysqli->query("SELECT * FROM drugs WHERE id = $id")->fetch_assoc();
        return !is_null($drug) ? $drug : null;
    }

    /**
     * Get a drug by Name
     * @param $name
     * @return array|null
     */
    public function getDrugByName($name)
    {
        $drug = $this->mysqli->query("SELECT * FROM drugs WHERE name_of_drug = '$name'")->fetch_assoc();
        return !is_null($drug) ? $drug : null;
    }

    /**
     * Get a drug by License
     * @param $license
     * @return array|null
     */
    public function getDrugByLicense($license)
    {
        $drug = $this->mysqli->query("SELECT * FROM drugs WHERE nda_registration_no = '$license'")->fetch_assoc();
        return !is_null($drug) ? $drug : null;
    }


    public function addHW($hw)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO doctors(surname,first_name,other_names,title,phone,email,
            address,reg_no,qualification,council,license,reg_date,status,notes,profile_pic,institution,nationality) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssssssssssssss", $hw[0], $hw[1], $hw[2],
            $hw[3], $hw[4], $hw[5], $hw[6], $hw[7], $hw[8], $hw[9], $hw[10], $hw[11],
            $hw[12],$hw[13],$hw[14],$hw[15],$hw[16]);
        $result = $stmt->execute();
        $stmt->close();

        return $result ? true : false;
    }

    public function updateHW($hw)
    {
        $stmt = $this->mysqli->prepare("UPDATE doctors SET surname= ?,first_name= ?,other_names= ?, title = ?, phone = ?, email = ?, 
                                              address = ?, reg_no = ?, qualification = ?, council = ?, license = ?, 
                                              reg_date = ?, status = ?, notes = ?, profile_pic = ?,institution= ?,
                                              nationality= ? WHERE id = $hw[13];");
        $stmt->bind_param("sssssssssssssssss", $hw[0], $hw[1], $hw[2],
            $hw[3], $hw[4], $hw[5], $hw[6], $hw[7], $hw[8], $hw[9], $hw[10], $hw[11],$hw[12],
            $hw[13],$hw[14],$hw[15],$hw[16]);
        $result = $stmt->execute();
        $stmt->close();

        return $result ? true : false;
    }

    public function get_hws($limit, $begin, $search)
    {
        $start = '';
        $to_search = '';
        $to_limit = '';
        if ($limit != null) {
            $to_limit = "  LIMIT " . $limit;
        }
        if ($begin != null) {
            $start = ' WHERE id >' . $begin;
        }
        if ($search != null) {
            $to_search = " WHERE surname LIKE '%"
                . $search . "%' OR first_name LIKE '%"
                . $search . "%' OR email LIKE '%"
                . $search . "%' OR phone LIKE '%"
                . $search . "%' OR council LIKE '%"
                . $search . "%' OR reg_no LIKE '%" . $search . "%'";
        }
        $result = $this->mysqli->query('SELECT * FROM doctors ' . $start . $to_search . $to_limit);
        $allhws = array();
        while ($hw = $result->fetch_assoc()) {
            $allhws[] = $hw;
        }
        return !is_null($allhws) ? $allhws : false;

    }

    /**
     * Get a Health worker by id
     * @param $id
     * @return array|null
     */
    public function getHwByID($id)
    {
        $hw = $this->mysqli->query("SELECT * FROM doctors WHERE id = $id")->fetch_assoc();
        return !is_null($hw) ? $hw : null;
    }

    public function getAllFacilities($limit, $begin, $search)
    {
        $start = '';
        $to_search = '';
        if ($limit == null) {
            $limit = 20;
        }
        if ($begin != null) {
            $start = ' WHERE id >' . $begin;
        }
        if ($search != null) {
            $to_search = " WHERE facility LIKE '%" . $search . "%' OR sector LIKE '%"
                . $search . "%' OR category LIKE '%" . $search . "%' ";
        }
        $result = $this->mysqli->query("SELECT * FROM facilities " . $start . $to_search . "  LIMIT " . $limit);
        $allFacilities = array();
        while ($facility = $result->fetch_assoc()) {
            $allFacilities[] = $facility;
        }
        return !is_null($allFacilities) ? $allFacilities : false;
    }


    public function addFacility($facility)
    {

        $stmt = $this->mysqli->prepare("INSERT INTO facilities(facility, address, sector, category,license, contact, phone, email, qualification, location) VALUES (?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssssss", $facility[0], $facility[1], $facility[2],
            $facility[3], $facility[4], $facility[5], $facility[6], $facility[7], $facility[8], $facility[9]);
        $result = $stmt->execute();
        $stmt->close();

        return $result ? true : false;
    }

    public function addFacilityHW($hw)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO facility_detail(hw_id, facility_id, position) VALUES (?,?,?)");
        $stmt->bind_param("iis", $hw[0], $hw[1], $hw[2]);
        $result = $stmt->execute();
        $stmt->close();

        return $result ? true : false;
    }

    public function addTraining($training)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO trainings(hw_id, type, award,school,started,ended,notes) 
                                              VALUES (?,?,?,?,?,?,?)");
        $stmt->bind_param("iisssss", $training[0], $training[1], $training[2], $training[3],
            $training[4],$training[5],$training[6]);
        $result = $stmt->execute();
        $stmt->close();

        return $result ? true : false;
    }

    /**
     * Get a HW trainings by ID
     * @param $id
     * @param $type
     * @return array|null
     */
    public function getTrainingsByID($id,$type)
    {
        $stmt = $this->mysqli->query("SELECT * FROM trainings WHERE hw_id = $id AND type=$type");
        $trainings = array();
        while ($training = $stmt->fetch_assoc()) {
            $trainings[] = $training;
        }
        return !is_null($trainings) ? $trainings : null;
    }


    public function removeTrainingByID($id){
        if(!empty($id)){
            $this->mysqli->query("DELETE FROM trainings WHERE id=$id");
            return true;
        }else{return false;}
    }
    /**
     * Get a Facility by id
     * @param $id
     * @return array|null
     */
    public function getFacilityByID($id)
    {
        $facility = $this->mysqli->query("SELECT * FROM facilities WHERE id = $id")->fetch_assoc();
        return !is_null($facility) ? $facility : null;
    }

    public function getFacilityHw($id)
    {

        $stmt = $this->mysqli->query("SELECT t1.id, t1.surname,t1.first_name,t1.reg_no,t1.status,t2.position, t2.date_added FROM doctors t1 INNER JOIN facility_detail t2 ON t1.id = t2.hw_id AND t2.facility_id=$id");
        $allHW = array();
        while ($hw = $stmt->fetch_assoc()) {
            $allHW[] = $hw;
        }
        return !is_null($allHW) ? $allHW : null;
    }

    public function getHwPositions($id){
        $stmt=$this->mysqli->query("SELECT t2.id, t1.facility,t2.position, t2.date_added FROM facilities t1 
                                                INNER JOIN facility_detail t2 ON t1.id = t2.hw_id AND t2.hw_id=$id");
        $allPositions = array();
        while ($position = $stmt->fetch_assoc()) {
            $allPositions[] = $position;
        }
        return !is_null($allPositions) ? $allPositions : null;
    }

    public function getHwPositionCount($id){
        $stmt=$this->mysqli->query("SELECT t2.id, t1.facility,t2.position, t2.date_added FROM facilities t1 
                                                INNER JOIN facility_detail t2 ON t1.id = t2.hw_id AND t2.hw_id=$id");
        $count=0;
        while ($stmt->fetch_assoc()) {
            $count++;
        }
        return $count;
    }

    public function addSectionTitle($section)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO section_titles(facility_id, section_title, status) VALUES (?,?,?)");
        $stmt->bind_param("iss", $section[0], $section[1], $section[2]);
        $result = $stmt->execute();
        $stmt->close();

        return $result ? true : false;
    }

    /**
     * Get a Facility Section by id
     * @param $id
     * @return array|null
     */
    public function getSectionTitlesByID($id)
    {
        $stmt = $this->mysqli->query("SELECT * FROM section_titles WHERE facility_id = $id");
        $sectionTitles = array();
        while ($sectionTitle = $stmt->fetch_assoc()) {
            $sectionTitles[] = $sectionTitle;
        }
        return !is_null($sectionTitles) ? $sectionTitles : null;
    }

    public function getSectionContentByID($id,$section)
    {
        $stmt = $this->mysqli->query("SELECT * FROM section_content WHERE facility_id = $id AND section_id=$section");
        $sectionTitles = array();
        while ($sectionTitle = $stmt->fetch_assoc()) {
            $sectionTitles[] = $sectionTitle;
        }
        return !is_null($sectionTitles) ? $sectionTitles : null;
    }

    public function addSubSectionTitle($section)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO section_content(facility_id, section_id,sub_title,content) VALUES (?,?,?,?)");
        $stmt->bind_param("iiss", $section[0], $section[1], $section[2],$section[3]);
        $result = $stmt->execute();
        $stmt->close();

        return $result ? true : false;
    }

    /**Return batch numbers from search query
     * @param $limit
     * @param $drug_id
     * @param $search
     * @return array|bool
     */
    public function getAllBatch($limit, $drug_id, $search)
    {
        if ($limit == null) {
            $limit = 20;
        }
        $id = !is_null($drug_id) ? ' WHERE drug_id =' . $drug_id : '';
        $to_search = !is_null($search) ? " WHERE batchno LIKE '%" . $search . "%' " : '';
        $stmt = $this->mysqli->query("SELECT * FROM batch " . $id . $to_search . "  LIMIT " . $limit);
        $allBatch = array();
        while ($batch = $stmt->fetch_assoc()) {
            $allBatch[] = $batch;
        }
        return !is_null($allBatch) ? $allBatch : false;

    }


    public function addBatchNo($batch)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO batch (drug_id,batchno,  made, expiry, reason)
        VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $batch['id'], $batch['batch-no'], $batch['dom'], $batch['expiry'], $batch['reason']);
        $result = $stmt->execute();
        $stmt->close();

        return $result ? true : false;
    }

    /**
     * Gets last inserted row id
     * @param $table_name
     * @return null
     */
    public function getLastID($table_name)
    {
        $stmt = $this->mysqli->prepare("SELECT id FROM " . $table_name . " WHERE id=(SELECT MAX(id) FROM " . $table_name . ")");
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id);
        return !is_null($id) ? $id : null;
    }

    function countDrugs()
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM drugs");
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows;
    }

    function countFacility()
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM facilities");
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows;
    }

    function countHw()
    {
        $stmt = $this->mysqli->prepare("SELECT id FROM doctors");
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
    function limitChars($text, $maxchar, $end = '...')
    {
        if (strlen($text) > $maxchar || $text == '') {
            $words = preg_split('/\s/', $text);
            $output = '';
            $i = 0;
            while (1) {
                $length = strlen($output) + strlen($words[$i]);
                if ($length > $maxchar) {
                    break;
                } else {
                    $output .= " " . $words[$i];
                    ++$i;
                }
            }
            $output .= $end;
        } else {
            $output = $text;
        }
        return $output;
    }

    /**
     * calculate elapsed time in days,months,years
     * @param Datetime $date
     * @param $oldDate
     * @return string
     */
    function time_ago($date,$oldDate) {
        $time_ago = '';

        $diff = $date->diff($oldDate);


        if (($t = $diff->format("%m")) > 0)
            $time_ago = $t . ' months';
        else if (($t = $diff->format("%d")) > 0)
            $time_ago = $t . ' days';
        else if (($t = $diff->format("%H")) > 0)
            $time_ago = $t . ' hours';
        else
            $time_ago = 'minutes';

        return $time_ago . ' ago ';
    }

    function registerMobile($phone)
    {
        // json response array
        $response = array("error" => FALSE);

        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
            // receiving the post params
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            //return if parameters are null
            if ($name == null || $email == null || $password == null) {
                $response["error"] = TRUE;
                $response["error_msg"] = "Required parameters (name, email or password) is missing!";
                echo json_encode($response);
                return;
            }

            // check if user is already existed with the same email
            if ($this->isUserExisted($email)) {
                // user already existed
                $response["error"] = TRUE;
                $response["error_msg"] = "User already existed with " . $email;
                echo json_encode($response);
            } else {
                // create a new user
                $user = $this->storeUser($name, $email, $phone,$password);
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

    function loginMobile()
    {
        // json response array
        $response = array("error" => FALSE);

        if (isset($_POST['email']) && isset($_POST['password'])) {

            // receiving the post params
            $email = $_POST['email'];
            $password = $_POST['password'];

            // get the user by email and password
            $user = $this->getUserByEmailAndPassword($email, $password);

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