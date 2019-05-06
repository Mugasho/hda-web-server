<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 3/31/2019
 * Time: 8:38 PM
 */

$api = new Hda\Page\Page('Api');
$db = new Hda\database\db();
$key = $match['params']['key'];
$response = array("error" => FALSE);
switch ($key) {
    case "all":
        $posts=$db->getAllPosts(null);
        $db->respond($posts,'posts',$response);
        break;
}