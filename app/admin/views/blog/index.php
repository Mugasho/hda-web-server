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
$db->hasAccess();
if(isset($_GET['r'])){
    $pid=$_GET['r'];
    if($db->deletePostByID($pid)){
     $blog->setPageError("Post deleted","success","success");
    }
}
$blog->setPageContent('blog/blog');
$blog->makePage();
