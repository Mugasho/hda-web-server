<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 2/21/2019
 * Time: 11:52 PM
 */

$hw = new Hda\Page\FrontPage('Health worker Detail');
$db = new Hda\database\db();
$id = isset($match['params']['id']) ? $match['params']['id'] : null;
$db->start_session();
$hw->setPageContent('hw/detail');
$hw->setPageVars($id);
$hw->setPageVars2($db->countHw(null));
$hw->makePage();