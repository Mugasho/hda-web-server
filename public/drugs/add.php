<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/18/2018
 * Time: 11:14 PM
 */

require '../../src/page/Page.php';
$search = isset($_GET['search']) ? $_GET['search'] : null;
$drug_add = new Page('Add drug');
$drug_add->setHasTitle(false);
$drug_add->setHasSetting(false);
$db = new \database\db();

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
    $db->addDrug($drug) ? header('Location:' . CONTENT_PATH . 'drugs/?search='.$drug[3]) : header('Location:' . CONTENT_PATH . 'drugs/add.php');
} else {
    $drug_add->setPageError('Please fill all fields',null,'danger');
}

$db->start_session();
if ($db->login_check() == true):

    //storeDrug($db)?true:null;
    !is_null($search)?header('Location:' . CONTENT_PATH . 'drugs/?search=' . $search):null;
    $drug_add->setPageContent('drug-add');
    //$drug_add->setPageError('Sample msg',null,'danger');
    $drug_add->makePage();
else:
    //$home->setPageError('Login first', null, 'danger');
    header('Location:' . CONTENT_PATH . 'login.php');
endif;

function storeDrug($db)
{
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
        return $db->addDrug($drug) ? true : false;
    } else {
        return false;
    }
}