<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/6/2018
 * Time: 6:09 PM
 */

$login = new \Hda\Page\Page('Login');
$db = new Hda\database\db();
$login->setHasTitle(false);
$db->start_session();
if (isset($_POST['email'], $_POST['password'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
    if ($db->getUserByEmailAndPassword($email, $password) == null) {
        $login->setPageError(' Wrong email or password', 'Login Failed', 'warning');
    } else {

        header('Location:' . ADMIN_PATH);
    }
}

$login->setPageContent('users/login');
$login->setHasMenu(false);
$login->setHasHeader(false);
$login->setHasBreadcrumb(false);
//$login->setPageError('Sample msg',null,'danger');
$login->makePage();
