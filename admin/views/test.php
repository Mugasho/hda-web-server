<?php
/**
 * Created by PhpStorm.
 * User: LINCOLN
 * Date: 10/20/2018
 * Time: 5:59 PM
 */
$con = mysqli_connect("localhost","hdaproject_user","01january2018","hdaproject_app");

// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else{
    echo "connected to ".$con->host_info;
}
