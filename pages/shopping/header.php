<?php
include_once (__DIR__.'../../connect.php');
$query=mysqli_query($conn,"select * from `loaisp`");
$rows = mysqli_fetch_all($query);

?>
<header id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="./index.php" class="navbar-brand">
            <h3 class="px-5">
                <i class="fas fa-shopping-basket"></i> Shop
            </h3>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
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

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="./cart.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart">
                        <i class="fas fa-shopping-cart"></i> Cart
                        <?php

                        if (isset($_SESSION['cart'])) {
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                        } else {
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                        }

                        ?>
                    </h5>
                </a>
            </div>
        </div>

    </nav>
</header>