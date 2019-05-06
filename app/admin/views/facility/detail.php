<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 1/31/2019
 * Time: 11:35 AM
 */

$id = isset($match['params']['id']) ? $match['params']['id'] : null;
$facility_detail = new \Hda\Page\Page('Facility details');
$facility_detail->setHasTitle(false);
$db = new Hda\database\db();

if (isset($_POST['hw-id'],$_POST['fc-id'],$_POST['position'])) {
    $hw[0]=$_POST['hw-id'];
    $hw[1]=$_POST['fc-id'];
    $hw[2]=$_POST['position'];
    if(!empty($hw[0])){
        $hws=$db->addFacilityHW($hw);
    }
}

if(isset($_POST['section-title'],$_POST['status'])){

    $section[0]=$id;
    $section[1]=$_POST['section-title'];
    $section[2]=$_POST['status'];
    if(!empty($section[1])){
        $db->addSectionTitle($section);
    }
}

if(isset($_POST['subsection-title'],$_POST['subsection-content'])){

    $subsection[0]=$id;
    $subsection[1]=$_POST['subsection-id'];
    $subsection[2]=$_POST['subsection-title'];
    $subsection[3]=$_POST['subsection-content'];
    if(!empty($subsection[2])){
        $db->addSubSectionTitle($subsection)?
            $facility_detail->setPageError('Sub section saved',null,'success'):
            $facility_detail->setPageError('Failed to save',null,'warning');
    }
}
$facility_detail->setPageVars($db->getFacilityByID($id));
$facility_detail->setPageVars2($db->getFacilityHw($id));
$db->start_session();
$db->hasAccess();

$facility_detail->setPageContent('facility/detail');
$facility_detail->makePage();

