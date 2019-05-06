<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/6/2018
 * Time: 11:07 PM
 */


$users = new Hda\Page\Page('Users');

$db = new Hda\database\db();
$db->start_session();
$db->hasAccess();
$users->setPageContent('users/users');
$all_users = $db->getAllUsers();
//$users->setPageError('Sample msg',null,'danger');
$users->makePage();
