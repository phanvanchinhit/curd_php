<?php
/**
 * Created by PhpStorm.
 * User: PHAN CHINH
 * Date: 29/07/2021
 * Time: 21:47
 */

include_once(__DIR__.'../../connect.php');
if(isset($_REQUEST['MaLoaiSP']) and $_REQUEST['MaLoaiSP']!=""){
    $MaLoaiSP=$_GET['MaLoaiSP'];
    $sql = "DELETE FROM loaisp WHERE MaLoaiSP='$MaLoaiSP'";
    if ($conn->query($sql) === TRUE) {
        echo "Xoá thành công!";
        header('location:index.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>