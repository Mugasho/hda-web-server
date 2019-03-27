<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 3/7/2019
 * Time: 2:56 PM
 */

$search = isset($_GET['search']) ? $_GET['search'] : null;
$blog_add = new \Hda\Page\Page('Add Post');
$blog_add->setHasTitle(true);
$blog_add->setHasSetting(false);
$db = new Hda\database\db();
$db->start_session();
$db->hasAccess($db->login_check());

if (isset($_POST['title'], $_POST['content'],
    $_POST['author'], $_POST['status'],
    $_POST['date_added'], $_POST['category'])) {
    $post[0] = $_POST['title'];
    $post[1] = $_POST['content'];
    $post[2] = $_POST['author'];
    $post[3] = $_POST['status'];
    $upload = new \Hda\utils\upload(null, $_FILES['blog_pic']);
    $uploaded = $upload->startUpload();
    if (!empty($uploaded['name'])) {
        $post[4] = $uploaded['name'];
    }
    $post[5] = $_POST['category'];
    $date_added=$_POST['date_added'];
    if (empty($date_added)) {
        $d = strtotime("now");
        $date_added = date("Y-m-d H:i:s", $d);
    }
    $post[6] = $date_added;
    $db->addPost($post) ? header('Location:' . BASE_PATH . 'blog/') : $blog_add->setPageError('Please fill all fields', null, 'danger');
}
$blog_add->addStyle('dropify.min.css', VENDOR . 'dropify/dist/css/');
$blog_add->addScripts('dropify.min.js', VENDOR . 'dropify/dist/js/');
$blog_add->addScripts('dropify.js', VENDOR . 'theme/js/');
$blog_add->setPageContent('blog/blog-add');
$blog_add->makePage();