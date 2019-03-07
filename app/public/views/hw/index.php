<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 2/19/2019
 * Time: 12:24 AM
 */
$hw = new Hda\Page\FrontPage('Health workers');
$db = new Hda\database\db();
$db->start_session();
$hw->setPageContent('hw/hw');
$hw->setPageVars2($db->countHw());
$hw->makePage();