<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 3/27/2019
 * Time: 3:51 PM
 */

$blog = new Hda\Page\FrontPage('Blog');
$db = new Hda\database\db();
$id = isset($match['params']['id']) ? $match['params']['id'] : null;
$blog->setPageContent('blog/detail');
$post=$db->getPostByID($id);
if(!is_null($post['id'])){$blog->setPageTitle($post['title']);}
$blog->setPageVars($post);
$blog->makePage();