<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 3/7/2019
 * Time: 12:02 PM
 */


$blog = new Hda\Page\FrontPage('Blog');
$db = new Hda\database\db();
$blog->setPageContent('blog/blog');
$blog->makePage();