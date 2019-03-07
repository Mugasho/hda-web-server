<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/6/2018
 * Time: 7:35 PM
 */

$hospital = new Hda\Page\Page('Facilities');

$db = new Hda\database\db();
$db->start_session();
$db->hasAccess($db->login_check());
$hospital->setPageContent('facility/facility');
$hospital->makePage();
