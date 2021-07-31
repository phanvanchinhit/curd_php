

<?php $title = "Cập nhật danh mục sản phẩm" ?>
<?php include_once('../../common/partials/header_script.php'); ?>
<?php include_once('../../common/partials/navbar.php'); ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Trang chủ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="http://localhost:<?php echo $HOST; ?>/crud_php/backend/category/index.php">Danh mục<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost:<?php echo $HOST; ?>/crud_php/backend/product/index.php">Sản Phẩm</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
<?php
// Kết nối Database
include_once (__DIR__.'../../connect.php');
$MaLoaiSP=$_GET['MaLoaiSP'];
$query=mysqli_query($conn,"select * from `loaisp` where MaLoaiSP='$MaLoaiSP'");
$row=mysqli_fetch_assoc($query);
?>
<div class="container">
    <h3>Cập nhật danh mục sản phẩm</h3>

    <form method="POST" class="form">
        <div class="form-group">
            <label for="exampleInputPassword1">Tên Danh Mục</label>
            <input type="text" name="TenLoaiSP" value="<?php echo $row['TenLoaiSP']; ?>" class="form-control" id="exampleInputPassword1" placeholder="Tên danh mục">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Mô tả</label>
            <textarea class="form-control" name="MoTa" id="exampleFormControlTextarea1" rows="3"><?php echo $row['MoTa']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="update_category">Cập nhật</button>
        <a href="index.php"><button type="button" class="btn btn-secondary">Quay lại</button></a>
        <?php
        if (isset($_POST['update_category'])){
            $MaLoaiSP=$_GET['MaLoaiSP'];
            $TenLoaiSP = $_POST['TenLoaiSP'];
            $MoTa = $_POST['MoTa'];

// Create connection
            $conn = new mysqli("localhost", "root", "", "crud_php");
// Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "UPDATE `loaisp` SET TenLoaiSP='$TenLoaiSP', MoTa='$MoTa' WHERE MaLoaiSP='$MaLoaiSP'";

            if ($conn->query($sql) === TRUE) {
                echo "Cập nhật thành công";
                header('location:index.php');
            } else {
                echo "không thành công do lỗi -->" . $conn->error;
            }

            $conn->close();
        }
        ?>
    </form>
</div>
<?php include_once('../../common/partials/footer_script.php'); ?>
