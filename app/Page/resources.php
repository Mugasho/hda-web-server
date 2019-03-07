<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 12/27/2018
 * Time: 12:33 PM
 */

$folder=$match['params']['folder'];
$res=$match['params']['res'];
$path='app/public/vendor/'.$folder.'/'.$res;
echo $path;