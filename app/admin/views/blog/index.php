<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 3/7/2019
 * Time: 12:10 PM
 */

$blog = new Hda\Page\Page('Blog');
$db = new Hda\database\db();
$db->start_session();
$db->hasAccess($db->login_check());
$blog->setPageContent('blog/blog');
$blog->makePage();
