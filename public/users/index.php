<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/6/2018
 * Time: 11:07 PM
 */

require '../../src/page/Page.php';

$users = new Page('Users');

$db = new \database\db();
$db->start_session();
if ($db->login_check() == true):
    $users->setPageContent('users');
    $all_users = $db->getAllUsers();
//$users->setPageError('Sample msg',null,'danger');
    $users->makePage();
else:
    $home->setPageError('Login first', null, 'danger');
    header('Location:login.php');
endif;