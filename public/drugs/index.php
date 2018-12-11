<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/6/2018
 * Time: 3:40 PM
 */
require '../../src/page/Page.php';



$drugs = new Page('Drugs');

$db = new \database\db();
$db->start_session();
if ($db->login_check() == true):

    $drugs->setPageContent('drugs');
    //$drugs->setPageError('Sample msg',null,'danger');
    $drugs->makePage();
else:
    //$home->setPageError('Login first', null, 'danger');
    header('Location:'.CONTENT_PATH.'login.php');
endif;