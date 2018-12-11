<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/7/2018
 * Time: 8:31 PM
 */

require '../../src/page/Page.php';
$id=isset($_GET['drug'])?$_GET['drug']:null;
$search=isset($_GET['search'])?$_GET['search']:null;
$drug_detail = new Page('Drug details');
$drug_detail->setHasTitle(false);
$db = new \database\db();
$drug_detail->setPageVars(!is_null($id)?$db->getDrugByID($id): header('Location:' . CONTENT_PATH . 'drugs/?search='.$search));
$drug_detail->setPageVars2($db->getAllBatch(100,$id,null));
$db->start_session();
if ($db->login_check() == true):

    $drug_detail->setPageContent('detail');
    //$drug_detail->setPageError('Sample msg',null,'danger');
    $drug_detail->makePage();
else:
    //$home->setPageError('Login first', null, 'danger');
    header('Location:'.CONTENT_PATH.'login.php');
endif;