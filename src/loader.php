<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 9/30/2018
 * Time: 10:16 PM
 */

require 'config/config.php';
require 'utils/error.php';
require 'database/db.php';
$db=new database\db();
$db->createTables();