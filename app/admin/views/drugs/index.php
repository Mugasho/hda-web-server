<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/6/2018
 * Time: 3:40 PM
 */

$drugs = new Hda\Page\Page('Drugs');
$db = new Hda\database\db();
$db->start_session();
$db->hasAccess();
$drugs->setPageContent('drugs/drugs');
$drugs->makePage();

