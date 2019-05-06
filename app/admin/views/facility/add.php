<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 1/28/2019
 * Time: 11:36 PM
 */
$facilityAdd = new Hda\Page\Page('Add Facility');
$db = new Hda\database\db();

if (isset($_POST['facility'], $_POST['license'], $_POST['category'], $_POST['sector'], $_POST['address'],
    $_POST['contact'], $_POST['phone'], $_POST['email'], $_POST['qualification'], $_POST['location'])) {
    $facility[0] = $_POST['facility'];
    $facility[1] = $_POST['address'];
    $facility[2] = $_POST['sector'];
    $facility[3] = $_POST['category'];
    $facility[4] = $_POST['license'];
    $facility[5] = $_POST['contact'];
    $facility[6] = $_POST['phone'];
    $facility[7] = $_POST['email'];
    $facility[8] = $_POST['qualification'];
    $facility[9] = $_POST['location'];

    $db->addFacility($facility) ? header('Location:' . ADMIN_PATH . 'facility/') : $facilityAdd->setPageError(' Facility not saved', 'Error', 'warning');
}
$db->start_session();
$db->hasAccess();
$facilityAdd->setPageContent('facility/facility-add');
$facilityAdd->makePage();
