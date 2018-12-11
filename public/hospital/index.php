<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/6/2018
 * Time: 7:35 PM
 */

require '../../src/page/Page.php';

$hospital=new Page('Hospitals');

$db=new \database\db();
$db->start_session();
if($db->login_check()==true):
    $hospital->setPageContent('hospital');
    $hospital->makePage();
else:
    $home->setPageError('Login first',null,'danger');
    header('Location:'.CONTENT_PATH.'login.php');
endif;