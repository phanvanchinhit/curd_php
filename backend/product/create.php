

<!DOCTYPE html>
<html>
<head>
    <title>Thêm Sản Phẩm</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Trang chủ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="http://localhost:8088/crud_php/backend/category/index.php">Danh mục<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost:8088/crud_php/backend/product/index.php">Sản Phẩm</a>
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
$query=mysqli_query($conn,"select * from `loaisp`");
$rows = mysqli_fetch_all($query);
?>
<div class="container">
<h3>Thêm mới sản phẩm</h3>

<form method="POST" class="form">
    <div class="form-group">
        <label for="exampleInputEmail1">Mã Sản Phẩm</label>
        <input type="number" name="MaSanPham" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mã Sản Phẩm">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Tên Sản Phẩm</label>
        <input type="text" name="TenSanPham" class="form-control" id="exampleInputPassword1" placeholder="Tên Sản Phẩm">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail11">Giá</label>
        <input type="number" name="Gia" class="form-control" id="exampleInputEmail11" aria-describedby="emailHelp" placeholder="Giá">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Tên Loại Sản Phẩm</label>
        <select class="form-control" name="MaLoaiSp" id="exampleFormControlSelect1">
            <?php foreach ($rows AS $row):?>
            <option value="<?php echo $row['0']?>"><?php echo $row['1']?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Mô tả</label>
        <textarea class="form-control" name="mota" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="create_product">Thêm mới</button>
    <a href="index.php"><button type="button" class="btn btn-secondary">Quay lại</button></a>
    <?php
    if (isset($_POST['create_product'])){
        $MaSanPham = $_POST['MaSanPham'];
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
        $sql = "INSERT INTO `sanpham` ( MaSanPham,TenSanPham, Gia,MaLoaiSp,mota ) VALUES('".$MaSanPham."','".$TenSanPham."','".$Gia."','".$MaLoaiSp."','".$mota."')";

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
</body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>