<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 2/24/2019
 * Time: 1:05 AM
 */

$facility = new Hda\Page\FrontPage('Facilities');
$db = new Hda\database\db();

if(isset($_GET['search'])){$params['search']=$_GET['search'];}
if(isset($_GET['location'])){$params['location']=$_GET['location'];}
if(isset($_GET['category'])){$params['category']=$_GET['category'];}
if(isset($_GET['sector'])){$params['sector']=$_GET['sector'];}
$limit=isset($_GET['limit'])?$_GET['limit']:30;
$db->start_session();
$facility->addScripts('isotop.js',VENDOR.'hunt/js/');
$facility->addScripts('rslider.js',VENDOR.'hunt/js/');
$facility->setPageContent('facility/facility');
$facility->setPageVars($db->getAllFacilities($limit,null,null));
$facility->setPageVars2($db->countfacility());
$facility->makePage();