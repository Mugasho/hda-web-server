<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 11/27/2018
 * Time: 7:44 AM
 */
$register = new Hda\Page\Page('Register');
$db = new Hda\database\db();
$register->setHasTitle(false);
$db->start_session();
if (isset($_POST['username'], $_POST['email'],$_POST['phone'], $_POST['password'], $_POST['repeat-password'])) {
    $name = $_POST['username'];
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
    $phone=filter_input(INPUT_POST, 'phone', FILTER_DEFAULT);
    $repeat = filter_input(INPUT_POST, 'repeat-password', FILTER_DEFAULT);
    if($password!=$repeat){
        $register->setPageError('Sorry, passwords do not match', 'Error', 'danger');}else{
        if ($db->isUserExisted($email)) {
            $register->setPageError(' User already exists with' . $email, 'Error', 'danger');
        } else {
            if (!is_null($db->storeUser($name, $email,$phone, $password))) {
                header('Location:'.ADMIN_PATH.'login/');
            } else {
                $register->setPageError(' Please retry later', 'Failed', 'danger');

                //header('Location:' . CONTENT_PATH);
            }
        }
    }

}

$register->setPageContent('users/register');
$register->setHasMenu(false);
$register->setHasHeader(false);
$register->setHasBreadcrumb(false);
//$register->setPageError('Sample msg',null,'danger');
$register->makePage();
