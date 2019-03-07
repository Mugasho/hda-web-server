<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 2/13/2019
 * Time: 10:10 PM
 */

if(isset($_GET['option'])){
        header('location: '.BASE_PATH.$_GET['option'].'/?search='.$_GET['search']);


}
$home = new Hda\Page\FrontPage('Home');
$db = new Hda\database\db();
$db->start_session();
$home->setIsHome(true);
$home->setPageContent('home/home');
$home->setPageVars($db->get_hws(10,null,null));
$home->makePage();
