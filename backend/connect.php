<?php
/**
 * Created by PhpStorm.
 * User: PHAN CHINH
 * Date: 29/07/2021
 * Time: 21:47
 */
include_once('../../common/config.php');
$conn = mysqli_connect($HOST,$USERNAME,$PASSWORD,$DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>