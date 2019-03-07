<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 2/3/2019
 * Time: 11:29 PM
 */
$hw=new Hda\Page\Page('Health workers');

$db=new Hda\database\db();
$db->start_session();
if($db->login_check()==true):
    $hw->setPageContent('hw/hw');
    $hw->makePage();
else:
    $hw->setPageError('Login first',null,'danger');
    header('Location:'. ADMIN_PATH.'login/');
endif;