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

if (isset($_POST['names'], $_POST['title'], $_POST['phone'], $_POST['email'], $_POST['address'], $_POST['reg_no'],
    $_POST['qualification'], $_POST['council'], $_POST['license'], $_POST['reg_date'], $_POST['status'], $_POST['notes'])) {
    $hw[0] = $_POST['names'];
    $hw[1] = $_POST['title'];
    $hw[2] = $_POST['phone'];
    $hw[3] = $_POST['email'];
    $hw[4] = $_POST['address'];
    $hw[5] = $_POST['reg_no'];
    $hw[6] = $_POST['qualification'];
    $hw[7] = $_POST['council'];
    $hw[8] = $_POST['license'];
    $hw[9] = $_POST['reg_date'];
    $hw[10] = $_POST['status'];
    $hw[11] = $_POST['notes'];
    $hw[12] = $_POST['profile-pic'];
    $hw[13] = $id;
    if(isset($_FILES['profile-pic'])){
        $upload = new \Hda\utils\upload(null, $_FILES['profile-pic']);
        $uploaded = $upload->startUpload();
        if (!empty($uploaded['name'])) {
            $hw[12] = $uploaded['name'];
        }
    }
    $db->updateHW($hw) ? header('Location:' . ADMIN_PATH . 'hw/detail/' . $id . '/') : $hwEdit->setPageError(' hw not saved', 'Error', 'warning');
}
$db->start_session();
$db->hasAccess($db->login_check());
$hwEdit->addStyle('dropify.min.css', VENDOR . 'dropify/dist/css/');
$hwEdit->addScripts('dropify.min.js', VENDOR . 'dropify/dist/js/');
$hwEdit->addScripts('dropify.js', VENDOR . 'theme/js/');
$hwEdit->setPageContent('hw/edit');
$hwEdit->setPageVars($id);
$hwEdit->makePage();