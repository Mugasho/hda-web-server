<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 9/30/2018
 * Time: 10:10 PM
 */

namespace Hda\config;

$protocol=!empty($_SERVER['HTTPS'])?'https://':'http://';
define("PROTOCOL",$protocol);
define("DB_HOST", "localhost");
define("DB_USER", "hdaproject_user");
define("DB_PASSWORD", "01january2018");
define("DB_DATABASE", 'hdaproject_app');
define("DB_PREFIX","vm_");
define("SERVER",PROTOCOL.$_SERVER['SERVER_NAME']);
define("ROUTE",$_SERVER['REQUEST_URI']);
define("BASE_PATH",PROTOCOL.$_SERVER['SERVER_NAME']."/app/");
define("APP_PATH",BASE_PATH."content/");
define("CONTENT_PATH",BASE_PATH."app/public/");
define("VENDOR",BASE_PATH.'vendor/');
define("ADMIN_PATH",BASE_PATH.'admin/');
define("APP_ROOT",$_SERVER['DOCUMENT_ROOT'].'/app/app/');
