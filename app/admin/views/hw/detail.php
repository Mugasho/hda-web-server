<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 2/4/2019
 * Time: 2:14 PM
 */

$id = isset($match['params']['id']) ? $match['params']['id'] : null;
$hw_detail = new \Hda\Page\Page('Health worker details');
$hw_detail->setHasTitle(false);
$db = new Hda\database\db();

if (isset($_POST['type'],$_POST['award'],$_POST['school'],$_POST['started'],$_POST['ended'],$_POST['notes'])) {
    $training[0]=$id;
    $training[1]=$_POST['type'];
    $training[2]=$_POST['award'];
    $training[3]=$_POST['school'];
    $training[4]=$_POST['started'];
    $training[5]=$_POST['ended'];
    $training[6]=$_POST['notes'];
    if(!empty($training[1])){
        if($db->addTraining($training)){
            $hw_detail->setPageError('Training saved',null,'success');
        };
    }
}

if(isset($_GET['act'],$_GET['itm'])){

    if($_GET['act']==1){
        $itm=$_GET['itm'];
        if($db->removeTrainingByID($itm)){
            $hw_detail->setPageError('Training removed',null,'success');
        };
    }
}
$hw_detail->setPageVars($db->getHwByID($id));
$hw_detail->setPageVars2($id);
$db->start_session();
$db->hasAccess($db->login_check());
$hw_detail->addStyle('dropify.min.css',VENDOR.'dropify/dist/css/');
$hw_detail->addScripts('dropify.min.js',VENDOR.'dropify/dist/js/');
$hw_detail->addScripts('dropify.js',VENDOR.'theme/js/');
$hw_detail->setPageContent('hw/detail');
$hw_detail->makePage();
