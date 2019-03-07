<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/7/2018
 * Time: 6:54 PM
 */

$api=new Hda\Page\Page('Api');
$db=new Hda\database\db();
$key=$match['params']['key'];
$id=$match['params']['id'];
switch ($key){
    case "byID":
        echo json_encode($db->getDrugByID($id));
        break;

    case "byName":
        echo json_encode($db->getDrugByName($id));
        break;
    case "byLicense":
        $id=str_replace("-","/",$id);
        echo json_encode($db->getDrugByLicense($id));
        break;
    case "all":
        $id=$id>0?$id:null;
        $start=isset($_GET['start'])?$_GET['start']:null;
        echo json_encode($db->getAllDrugs($id,$start,null));
        break;
}



