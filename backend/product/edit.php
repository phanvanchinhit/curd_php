


<?php $title = "Sửa Sản Phẩm" ?>
<?php include_once('../../common/partials/header_script.php'); ?>
<?php
// Kết nối Database
include_once (__DIR__.'../../connect.php');
$query=mysqli_query($conn,"select * from `loaisp`");
$rowss = mysqli_fetch_all($query);
$MaSanPham=$_GET['MaSanPham'];
$query=mysqli_query($conn,"select * from `sanpham` where MaSanPham='$MaSanPham'");
$row=mysqli_fetch_assoc($query);
?>
<div class="container">
    <h3>Thêm mới sản phẩm</h3>

    <form method="POST" class="form">
        <div class="form-group">
            <label for="exampleInputPassword1">Tên Sản Phẩm</label>
            <input type="text" name="TenSanPham" value="<?php echo $row['TenSanPham']; ?>" class="form-control" id="exampleInputPassword1" placeholder="Tên Sản Phẩm">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail11">Giá</label>
            <input type="number" name="Gia" value="<?php echo $row['Gia']; ?>" class="form-control" id="exampleInputEmail11" aria-describedby="emailHelp" placeholder="Giá">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Tên Loại Sản Phẩm</label>
            <select class="form-control" name="MaLoaiSp" id="exampleFormControlSelect1">
                <?php foreach ($rowss AS $rowa):?>
                    <option value="<?php echo $rowa['0']?>"><?php echo $rowa['1']?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Mô tả</label>
            <textarea class="form-control" name="mota" id="exampleFormControlTextarea1" rows="3"><?php echo $row['mota']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="update_product">Cập nhật</button>
        <a href="index.php"><button type="button" class="btn btn-secondary">Quay lại</button></a>
        <?php
        if (isset($_POST['update_product'])){
            $MaSanPham = $_GET['MaSanPham'];
            $TenSanPham = $_POST['TenSanPham'];
            $Gia = $_POST['Gia'];
            $MaLoaiSp = $_POST['MaLoaiSp'];
            $mota = $_POST['mota'];

// Create connection
            $conn = new mysqli("localhost", "root", "", "crud_php");
// Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "UPDATE `sanpham` SET TenSanPham='$TenSanPham', Gia='$Gia', MaLoaiSp='$MaLoaiSp',mota='$mota' WHERE MaSanPham='$MaSanPham'";

            if ($conn->query($sql) === TRUE) {
                echo "Cập nhât thành công";
                header('location:index.php');
            } else {
                echo " không thành công do lỗi -->" . $conn->error;
            }

            $conn->close();
        }
        ?>
    </form>
</div>
<?php include_once('../../common/partials/footer_script.php'); ?>