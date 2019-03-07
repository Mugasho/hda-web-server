<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/7/2018
 * Time: 8:31 PM
 */


$id = isset($match['params']['id']) ? $match['params']['id'] : null;
$drug_detail = new \Hda\Page\Page('Drug details');
$drug_detail->setHasTitle(false);
$db = new Hda\database\db();

if (isset($_POST['dom'], $_POST['expiry'], $_POST['batch-no'])) {

    $batch['id'] = $id + 0;
    $batch['batch-no'] = $_POST['batch-no'];
    $batch['dom'] = $_POST['dom'];
    $batch['expiry'] = $_POST['expiry'];
    $batch['reason'] = $_POST['reason'];
    if (!$db->addBatchNo($batch) == true) {
        $drug_detail->setPageError('  Batch not saved', "Error", 'danger');
    }

}
$drug_detail->setPageVars($db->getDrugByID($id));
$drug_detail->setPageVars2($db->getAllBatch(100, $id, null));
$db->start_session();
$db->hasAccess($db->login_check());
$drug_detail->setPageContent('drugs/detail');
//$drug_detail->setPageError('Sample msg',null,'danger');
$drug_detail->makePage();
