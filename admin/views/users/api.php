<?php

$db=new Hda\database\db();

//$users=new \Hda\models\User();
$action=$match['params']['action'];
// json response array
$response = array("error" => FALSE);

if($action=='login'){
if(isset($_POST['email']) && isset($_POST['password'])){

// receiving the post params
$email = $_POST['email'];
$password = $_POST['password'];

// get the user by email and password
$user = $db->getUserByEmailAndPassword($email, $password);

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
}}else{
    if (isset($_POST['username']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['password'])) {

        $name=filter_input(INPUT_POST, 'username', FILTER_DEFAULT);
        $phone=filter_input(INPUT_POST, 'phone', FILTER_DEFAULT);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);

        // check if user is already existed with the same email
        if ($db->isUserExisted($email)) {
            // user already existed
            $response["error"] = TRUE;
            $response["error_msg"] = "User already existed with " . $email;
            echo json_encode($response);
        } else {
            // create a new user
            $user = $db->storeUser($name, $email,$phone, $password);
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

