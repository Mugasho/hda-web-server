<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/18/2018
 * Time: 11:14 PM
 */


$search = isset($_GET['search']) ? $_GET['search'] : null;
$drug_add = new \Hda\Page\Page('Add drug');
$drug_add->setHasTitle(true);
$drug_add->setHasSetting(false);
$db = new Hda\database\db();

if (isset($_POST['nda_registration_no'], $_POST['license_holder'],
    $_POST['local_technical_representative'], $_POST['name_of_drug'],
    $_POST['generic_name_of_drug'], $_POST['strength_of_drug'],
    $_POST['manufacturer'], $_POST['country_of_manufacture'], $_POST['dosage_form'], $_POST['pack_size'])) {
    $drug[0] = $_POST['nda_registration_no'];
    $drug[1] = $_POST['license_holder'];
    $drug[2] = $_POST['local_technical_representative'];
    $drug[3] = $_POST['name_of_drug'];
    $drug[4] = $_POST['generic_name_of_drug'];
    $drug[5] = $_POST['strength_of_drug'];
    $drug[6] = $_POST['manufacturer'];
    $drug[7] = $_POST['country_of_manufacture'];
    $drug[8] = $_POST['dosage_form'];
    $drug[9] = $_POST['pack_size'];
    $db->addDrug($drug) ? header('Location:' . BASE_PATH . 'drugs/') : $drug_add->setPageError('Please fill all fields', null, 'danger');
}
$db->start_session();
$db->hasAccess($db->login_check());
//storeDrug($db)?true:null;
!is_null($search) ? header('Location:' . CONTENT_PATH . 'drugs/?search=' . $search) : null;
$drug_add->addScripts('jquery.steps.min.js', VENDOR . 'wizard/');
$drug_add->addScripts('jquery.validate.min.js', VENDOR . 'wizard/');
$drug_add->addStyle('steps.css', VENDOR . 'wizard/');
$drug_add->addScripts('steps.js', VENDOR . 'wizard/');
$drug_add->setPageContent('drugs/drug-add');
//$drug_add->setPageError('Sample msg',null,'danger');
$drug_add->makePage();
