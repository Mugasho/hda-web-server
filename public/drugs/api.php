<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/7/2018
 * Time: 6:54 PM
 */

require '../../src/page/Page.php';

$api=new Page('Api');
$db=new \database\db();
$limit=isset($_POST['limit'])?$_POST['limit']:null;
echo json_encode($db->getAllDrugs($limit,null,null));
