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
$return=isset($_GET['return'])?SERVER.$_GET['return']:null;
$location=ADMIN_PATH;
if (isset($_POST['email'], $_POST['password'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
    if ($db->getUserByEmailAndPassword($email, $password) != null) {

        header('Location:' . $location);
    } else {
        $login->setPageError(' Wrong email or password', 'Login Failed', 'warning');
    }
}

$login->setPageContent('users/login');
$login->setHasMenu(false);
$login->setHasHeader(false);
$login->setHasBreadcrumb(false);
$login->makePage();
