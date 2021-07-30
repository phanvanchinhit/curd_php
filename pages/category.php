<?php $title = "Danh mục" ?>
<?php include_once('../common/partials/header_script.php'); ?>
<?php include_once(__DIR__.'../partials/navbar.php'); 
    include_once (__DIR__.'../connect.php'); 
    $id = null;
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    $sql = "select * from `sanpham` where `maloaisp` = '$id';";
    $query=mysqli_query($conn,$sql);
    $q = "select tenloaisp FROM `loaisp` where `maloaisp` = '$id'";
    $r = mysqli_query($conn,$q);
    
?>
<?php 
while($i = mysqli_fetch_array($r)){
    ?>
    <h2 class="p-3"><?php echo $i['tenloaisp']; ?></h2>
    <?php
}
?>
<div class="row p-5">
<?php
while($row=mysqli_fetch_array($query)){
    ?>
    <div class="col-3 mp-3">
        <div class="card">
            <!-- <img class="card-img-top" src="img_avatar1.png" alt="Card image" style="width:100%"> -->
            <div class="card-body">
            <h4 class="card-title"><?php echo $row['TenSanPham']; ?></h4>
            <p class="card-text"><?php echo (number_format($row['Gia'], 0, '', ',')); ?> VNĐ
            <br>
            <a href="#" class="btn btn-primary">Thêm vào giỏ hàng</a>
            </div>
        </div>
    </div>

    <?php
}
?>
</div>


<?php include_once('../common/partials/footer_script.php'); ?>