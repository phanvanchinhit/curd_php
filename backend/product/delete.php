<?php
/**
 * Created by PhpStorm.
 * User: PHAN CHINH
 * Date: 29/07/2021
 * Time: 21:47
 */

include_once(__DIR__.'../../connect.php');
?>
<?php
if(isset($_REQUEST['MaSanPham']) and $_REQUEST['MaSanPham']!=""){
    $MaSanPham=$_GET['MaSanPham'];
    $sql = "DELETE FROM sanpham WHERE MaSanPham='$MaSanPham'";
    if ($conn->query($sql) === TRUE) {
        echo "Xoá thành công!";
        header('location:index.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>