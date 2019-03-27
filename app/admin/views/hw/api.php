<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 3/8/2019
 * Time: 10:17 PM
 */

$hwApi = new Hda\Page\Page('hwsAPI');
$db = new Hda\database\db();
$response = array("error" => FALSE);
$key = $match['params']['key'];
$id = $match['params']['id'];
switch ($key) {
    case 'byID':
        $hw = $db->getHwByID($id);
        $db->respond($hw,'hw',$response);
        break;

    case "byName":
        $names=explode('-',$id);
        $surname=isset($names[0])?$names[0]:$id;
        $last_name=isset($names[1])?$names[1]:null;
        $hw = $db->getHwByName($surname,$last_name);
        $db->respond($hw,'hw',$response);
        break;
    case "byLicense":
        $hw = $db->getHwByLicense($id);
        $db->respond($hw,'hw',$response);
        break;
    case "byRegNo":
        $hw = $db->getHwByRegNo($id);
        $db->respond($hw,'hw',$response);
        break;
    default:
        $db->respond(null,'hw',$response);
        break;
}