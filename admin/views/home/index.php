<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/5/2018
 * Time: 11:27 AM
 */

if (!defined('BASE_PATH')) {
    exit;
}

$home = new Hda\Page\Page('Home');
$db = new Hda\database\db();
$db->start_session();
$db->hasAccess($db->login_check());
$home->setPageContent('home/home');
$PageVars['drug_count'] = $db->countDrugs();
$PageVars['hw_count'] = $db->countHw();
$PageVars['facilities'] = $db->countFacility();
$home->setPageVars($PageVars);
//$home->setPageError('Sample msg',null,'danger');
$home->makePage();
