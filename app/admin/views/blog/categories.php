<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 3/31/2019
 * Time: 5:09 PM
 */

$category = new Hda\Page\Page('Categories');
$db = new Hda\database\db();
$db->start_session();
if(isset($_POST['category'],$_POST['description'])){
    $user=$db->getUserByUID($_SESSION['user_id']);
    $PostCategory[0]=$_POST['category'];
    $PostCategory[1]=$_POST['description'];
    $PostCategory[2]=$user['id'];
    $db->addPostCategory($PostCategory);
}

$db->hasAccess();
$category->setPageContent('blog/categories');
$category->makePage();