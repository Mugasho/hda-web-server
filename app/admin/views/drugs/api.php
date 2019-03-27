<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/7/2018
 * Time: 6:54 PM
 */

$api = new Hda\Page\Page('Api');
$db = new Hda\database\db();
$key = $match['params']['key'];
$id = $match['params']['id'];
$response = array("error" => FALSE);
switch ($key) {
    case "byID":
        $drug=$db->getDrugByID($id);
        $db->respond($drug,'drug',$response);
        break;

    case "byName":
        $drug=$db->getDrugByName($id);
        $db->respond($drug,'drug',$response);
        break;
    case "byLicense":
        $id = str_replace("-", "/", $id);
        $drug=$db->getDrugByLicense($id);
        $db->respond($drug,'drug',$response);
        break;
    case "all":
        $id = $id > 0 ? $id : null;
        $current = isset($_GET['pg']) ? $_GET['pg'] : 1;
        $count = isset($_GET['count']) ? $db->countDrugs() : 0;
        $limit = !empty($id) ? $id : 30;
        $pages = round($count / $limit, 0);
        $start = $current < 5 ? 1 : $current - 4;
        $last = ($current + 4) > $pages ? $pages : $current + 4;
        $next_id = (($current - 1) * $limit);
        $response['pages'] = $pages;
        $response['current'] = $current;
        $response['items'] = $count;
        $drug = $db->getAllDrugs($id, $next_id, null);
        $db->respond($drug,'drugs',$response);
        break;

    default:
        $db->respond(null,'drug',$response);
        break;
}


