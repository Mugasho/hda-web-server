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
$db->hasAccess($db->login_check());
$hw->setPageContent('hw/hw');
$hw->makePage();
