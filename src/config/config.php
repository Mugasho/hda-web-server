<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 9/30/2018
 * Time: 10:10 PM
 */

namespace config;
$protocol=!empty($_SERVER['HTTPS'])?'https://':'http://';
define("DB_HOST", "localhost");
define("DB_USER", "hdaproject_user");
define("DB_PASSWORD", "01january2018");
define("DB_DATABASE", 'hdaproject_app');
define("DB_PREFIX","vm_");
define("BASE_PATH",$protocol.$_SERVER['SERVER_NAME']."/app/");
define("APP_PATH",BASE_PATH."src/content/");
define ("SRC_PATH",BASE_PATH."src/");
define("CONTENT_PATH",BASE_PATH."public/");
