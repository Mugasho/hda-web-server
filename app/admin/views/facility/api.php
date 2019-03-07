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
$hwID = $match['params']['id'];
switch ($key) {
    case 'byID':
        $hws = $db->getHwByID($hwID);
        if (!is_null($hws)) {
            $response = $hws;
            $response['error'] = false;
        }
        break;


}
echo json_encode($response);
