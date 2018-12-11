<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/6/2018
 * Time: 6:09 PM
 */

require '../src/page/Page.php';

$login = new Page('Login');
$db=new \database\db();
$login->setHasTitle(false);
// json response array
$response = array("error" => FALSE);

if ( isset($_POST['mobile'])) {
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
}}
else {

    $db->start_session();
    if (isset($_POST['email'], $_POST['password'])) {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
        if ($db->getUserByEmailAndPassword($email, $password) == null) {
            $login->setPageError(' Wrong email or password', 'Failed', 'danger');
        } else {

            header('Location:' . CONTENT_PATH);
        }
    }

    $login->setPageContent('login');
    $login->setHasMenu(false);
    $login->setHasHeader(false);
    $login->setHasBreadcrumb(false);
//$login->setPageError('Sample msg',null,'danger');
    $login->makePage();
}