<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 12/27/2018
 * Time: 3:04 PM
 */

$hospital = new Hda\Page\Page('HospitalsAPI');
$db = new Hda\database\db();
$response = array("error" => FALSE);
$key = $match['params']['key'];
$id = $match['params']['id'];
switch ($key) {
    case 'byID':
        $facility = $db->getFacilityByID($id);
        $db->respond($facility,'facility',$response);
        break;

    case "byName":
        $facility = $db->getFacilityByName($id);
        $db->respond($facility,'facility',$response);
        break;
    case "byCategory":
        $facility = $db->getFacilityByName($id);
        $db->respond($facility,'facility',$response);
        break;
    case "all":
        $id = $id > 0 ? $id : null;
        $current = isset($_GET['pg']) ? $_GET['pg'] : 1;
        $limit = !empty($id) ? $id : 30;
        $count = isset($_GET['count']) ? $db->countFacility() : 0;
        $pages = round($count / $limit, 0);
        $start = $current < 5 ? 1 : $current - 4;
        $last = ($current + 4) > $pages ? $pages : $current + 4;
        $next_id = (($current - 1) * $limit);
        $response['pages'] = $pages;
        $response['current'] = $current;
        $response['items'] = $count;
        $facility = $db->getAllFacilities($id, $next_id, null);
        $db->respond($facility,'facility',$response);
        break;
    case "hw":
        $facility = $db->getFacilityHW($id);
        $db->respond($facility,'hw',$response);
        break;

    default:
        $db->respond(null,'facility',$response);
        break;
}

