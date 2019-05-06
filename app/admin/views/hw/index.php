<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 2/3/2019
 * Time: 11:29 PM
 */
$hw = new Hda\Page\Page('Health workers');

$db = new Hda\database\db();
$db->start_session();
$db->hasAccess();
if(isset($_GET['r'])){
    $hwID=$_GET['r'];
    if($db->deleteHWByID($hwID)){
        $hw->setPageError('Health worker deleted','success','success');
    }
}
$hw->setPageContent('hw/hw');
$hw->makePage();
