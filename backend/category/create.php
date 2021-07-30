

<?php $title = "Thêm loại sản phẩm" ?>
<?php include_once('../../common/partials/header_script.php'); ?>
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
//include 'connect.php';
?>
<div class="container">
<h3>Thêm mới danh mục sản phẩm</h3>

<form method="POST" class="form">
    <div class="form-group">
        <label for="exampleInputEmail1">Mã Danh Mục</label>
        <input type="number" name="MaLoaiSP" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mã danh mục">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Tên Danh Mục</label>
        <input type="text" name="TenLoaiSP" class="form-control" id="exampleInputPassword1" placeholder="Tên danh mục">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Mô tả</label>
        <textarea class="form-control" name="MoTa" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="create_category">Thêm mới</button>
    <a href="index.php"><button type="button" class="btn btn-secondary">Quay lại</button></a>
    <?php
    if (isset($_POST['create_category'])){
        $MaLoaiSP = $_POST['MaLoaiSP'];
        $TenLoaiSP = $_POST['TenLoaiSP'];
        $MoTa = $_POST['MoTa'];

// Create connection
        $conn = new mysqli("localhost", "root", "", "crud_php");
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "INSERT INTO `loaisp` (MaLoaiSP,TenLoaiSP, MoTa) VALUES('".$MaLoaiSP."','".$TenLoaiSP."','".$MoTa."')";

        if ($conn->query($sql) === TRUE) {
            echo "Thêm mới thành công";
            header('location:index.php');
        } else {
            echo "Thêm mới không thành công do lỗi -->" . $conn->error;
        }

        $conn->close();
    }
    ?>
</form>
</div>
<?php include_once('../../common/partials/footer_script.php'); ?>