<?php
include_once(__DIR__.'/config.php');
$conn = mysqli_connect($HOST,$USERNAME,$PASSWORD,$DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>