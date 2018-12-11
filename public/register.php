<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 11/27/2018
 * Time: 7:44 AM
 */

require '../src/page/Page.php';

$register = new Page('register');
$db=new \database\db();
$register->setHasTitle(false);
// json response array
$response = array("error" => FALSE);
$response['status']="fine";

if ( isset($_POST['mobile'])) {


    if (isset($_POST['first-name']) && isset($_POST['last-name']) && isset($_POST['email']) && isset($_POST['password'])) {

        // receiving the post params
        $name=$_POST['first-name']." ".$_POST['last-name'];
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
        $repeat=filter_input(INPUT_POST, 'repeat-password', FILTER_DEFAULT);

        // check if user is already existed with the same email
        if ($db->isUserExisted($email)) {
            // user already existed
            $response["error"] = TRUE;
            $response["error_msg"] = "User already existed with " . $email;
            echo json_encode($response);
        } else {
            // create a new user
            $user = $db->storeUser($name, $email, $password);
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
    }}else {

    $db->start_session();
    if (isset($_POST['first-name'],$_POST['last-name'] , $_POST['email'], $_POST['password'], $_POST['repeat-password'])) {
        $name=$_POST['first-name']." ".$_POST['last-name'];
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
        $repeat=filter_input(INPUT_POST, 'repeat-password', FILTER_DEFAULT);
        if ($db->isUserExisted($email)) {
            $register->setPageError(' User already exists with'.$email, 'Error', 'danger');
        }else {
            if (!is_null($db->storeUser($name, $email, $password))) {
                header('Location:' . CONTENT_PATH);
            } else {
                $register->setPageError(' Please retry later', 'Failed', 'danger');

                //header('Location:' . CONTENT_PATH);
            }
        }
    }

    $register->setPageContent('register');
    $register->setHasMenu(false);
    $register->setHasHeader(false);
    $register->setHasBreadcrumb(false);
    //$register->setPageError('Sample msg',null,'danger');
    $register->makePage();
}