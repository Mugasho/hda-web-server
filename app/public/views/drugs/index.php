<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 2/24/2019
 * Time: 9:09 PM
 */

$drugs = new Hda\Page\FrontPage('Drugs');
$db = new Hda\database\db();
$drugs->setPageContent('drugs/drugs');
$drugs->makePage();
