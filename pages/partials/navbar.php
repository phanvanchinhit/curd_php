
<?php 
include_once (__DIR__.'../../connect.php'); 
$query=mysqli_query($conn,"select * from `loaisp`");
$rows = mysqli_fetch_all($query); 

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Online Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
            <div class="dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Danh mục
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <?php foreach ($rows AS $row):?>
                    <a class="dropdown-item" href="http://localhost:<?php echo $PORT; ?>/crud_php/pages/category.php?id=<?php  echo $row['0'] ?>"><?php echo $row['1']?></a>
                <?php endforeach;?>
            </div>
            </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost:<?php echo $PORT; ?>/crud_php/pages/shopping/index.php">Giỏ hàng</a>
            </li>
        </ul>
    </div>
</nav>