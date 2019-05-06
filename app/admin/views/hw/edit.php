<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 2/12/2019
 * Time: 5:37 PM
 */

$hwEdit = new Hda\Page\Page('Edit Health Worker');
$db = new Hda\database\db();

$id = isset($match['params']['id']) ? $match['params']['id'] : null;

if (isset($_POST['surname'],$_POST['first_name'],$_POST['other_names'], $_POST['title'], $_POST['phone'], $_POST['email'], $_POST['address'], $_POST['reg_no'],
    $_POST['qualification'], $_POST['council'], $_POST['license'], $_POST['reg_date'], $_POST['status'], $_POST['notes'],
    $_POST['institution'],$_POST['nationality'])) {
    $hw[0] = $_POST['surname'];
    $hw[1] = $_POST['first_name'];
    $hw[2] = $_POST['other_names'];
    $hw[3] = $_POST['title'];
    $hw[4] = $_POST['phone'];
    $hw[5] = $_POST['email'];
    $hw[6] = $_POST['address'];
    $hw[7] = $_POST['reg_no'];
    $hw[8] = $_POST['qualification'];
    $hw[9] = $_POST['council'];
    $hw[10] = $_POST['license'];
    $hw[11] = $_POST['reg_date'];
    $hw[12] = $_POST['status'];
    $hw[13] = $_POST['notes'];
    $hw[14] = $_POST['profile-pic'];
    if(!empty($_FILES['profile-pic']['name'])){
        $upload = new \Hda\utils\upload(null, $_FILES['profile-pic']);
        $uploaded = $upload->startUpload();
        if (!empty($uploaded['name'])) {
            $hw[14] = $uploaded['name'];
        }
    }
    $hw[15] = $_POST['institution'];
    $hw[16] = $_POST['nationality'];
    $hw[17] = $id;
    $db->updateHW($hw) ? header('Location:' . ADMIN_PATH . 'hw/detail/' . $id . '/') : $hwEdit->setPageError(' hw not saved', 'Error', 'warning');
}else{
    $hwEdit->setPageError(' hw not saved', 'Error', 'warning');
}
$db->start_session();
$db->hasAccess();
$hwEdit->addStyle('dropify.min.css', VENDOR . 'dropify/dist/css/');
$hwEdit->addScripts('dropify.min.js', VENDOR . 'dropify/dist/js/');
$hwEdit->addScripts('dropify.js', VENDOR . 'theme/js/');
$hwEdit->setPageContent('hw/edit');
$hwEdit->setPageVars($id);
$hwEdit->makePage();