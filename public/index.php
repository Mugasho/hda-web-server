<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/5/2018
 * Time: 11:27 AM
 */

require '../src/page/Page.php';

$home=new Page('Home');

$db=new \database\db();
$db->start_session();
if($db->login_check()==true):
$home->setPageContent('home');
$PageVars['drug_count']=$db->countDrugs();
$PageVars['facilities']=$db->countFacility();
$home->setPageVars($PageVars);
//$home->setPageError('Sample msg',null,'danger');
$home->makePage();

else:
    $home->setPageError('Login first',null,'danger');
    header('Location:login.php');
endif;
