<?php
/**
 * Created by PhpStorm.
 * User: PHAN CHINH
 * Date: 29/07/2021
 * Time: 21:47
 */

$conn = mysqli_connect("localhost","root","","crud_php");
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>