
<?php $title = "Danh mục sản phẩm" ?>
<?php include_once('../../common/partials/header_script.php'); ?>
<?php include_once('../../common/partials/navbar.php'); ?>
    <div class="container">
        <h3>
            Danh mục sản phẩm
        </h3>

        <a href="create.php"><button type="button" class="btn btn-primary">Thêm mới</button></a>
        <table style="margin-top: 20px" border="1" cellspacing="0" cellpadding="0">
            <tr>
                <td>Mã danh mục</td>
                <td>Tên danh mục</td>
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
            $query=mysqli_query($conn,"select * from `loaisp`");
            while($row=mysqli_fetch_array($query)){
                ?>
                <tr>
                    <td><?php echo $row['MaLoaiSP']; ?></td>
                    <td><?php echo $row['TenLoaiSP']; ?></td>
                    <td><?php echo $row['MoTa']; ?></td>
                    <td><a href="edit.php?MaLoaiSP=<?php echo $row['MaLoaiSP']; ?>">Sửa</a></td>
                    <td><a href="delete.php?MaLoaiSP=<?php echo $row['MaLoaiSP']; ?>">Xóa</a></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
<?php include_once('../../common/partials/footer_script.php'); ?>
