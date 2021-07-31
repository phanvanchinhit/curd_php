
<?php $title = "Danh sách sản phẩm" ?>
<?php include_once('../../common/partials/header_script.php'); ?>
<?php include_once('../../common/partials/navbar.php'); ?>
    <div class="container">
        <h3>
            Danh sách sản phẩm
        </h3>

        <a href="create.php"><button type="button" class="btn btn-primary">Thêm mới</button></a>
        <table style="margin-top: 20px" border="1" cellspacing="0" cellpadding="0">
            <tr style="font-style: italic">
                <td>Mã sản phẩm</td>
                <td>Tên sản phẩm</td>
                <td>Giá</td>
                <td>Mã danh mục</td>
                <td>Mô tả</td>
                <td colspan="2">Tác vụ</td>
            </tr>
            <style>
                td {
                    padding: 20px;
                }
            </style>
            <?php
            include_once (__DIR__.'../../connect.php');
            $query=mysqli_query($conn,"select * from `sanpham`");
            while($row=mysqli_fetch_array($query)){
                ?>
                <tr>
                    <td><?php echo $row['MaSanPham']; ?></td>
                    <td><?php echo $row['TenSanPham']; ?></td>
                    <td><?php echo (number_format($row['Gia'], 0, '', ',')); ?> VNĐ</td>
                    <td><?php echo $row['MaLoaiSp']; ?></td>
                    <td><?php echo $row['mota']; ?></td>
                    <td><a href="edit.php?MaSanPham=<?php echo $row['MaSanPham']; ?>">Sửa</a></td>
                    <td><a href="delete.php?MaSanPham=<?php echo $row['MaSanPham']; ?>">Xóa</a></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
    <?php include_once('../../common/partials/footer_script.php'); ?>

