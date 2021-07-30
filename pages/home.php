<?php $title = "Trang chủ" ?>
<?php include_once('../common/partials/header_script.php'); ?>
<?php include_once(__DIR__.'../partials/navbar.php'); 
    include_once (__DIR__.'../connect.php'); 
?>


<h2 class="m-3">
    Tất cả sản phẩm
</h2>

<?php

$query=mysqli_query($conn,"select * from `sanpham`");
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