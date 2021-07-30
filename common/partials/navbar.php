
<?php include_once (__DIR__.'../../config.php'); ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">ADMIN</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php if($cat_at) echo ('active'); else echo('');?>">
                <a class="nav-link" href="http://localhost:<?php echo $PORT; ?>/crud_php/backend/category/index.php">QL Danh mục<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php if($cat_at) echo ('active'); else echo('');?>">
                <a class="nav-link" href="http://localhost:<?php echo $PORT; ?>/crud_php/backend/product/index.php">QL Sản Phẩm</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>