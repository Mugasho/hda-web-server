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
$PageVars['drug_count'] = $db->countDrugs(null);
$PageVars['hw_count'] = $db->countHw(null);
$PageVars['facilities'] = $db->countFacility(null);
$home->setPageVars($PageVars);
//$home->setPageError('Sample msg',null,'danger');
$home->makePage();
