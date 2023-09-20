<?php
include('includes/connect.php');
include('functions/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nikesh Store</title>
    <!-- BOOTSTRAP CSS LINK-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- FONT AWES-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--JAVASCRIPT LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <!--INTERNAL STYLE SHEET-->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!--NAVABAR-->
    <div class="container-fluid p-0">

        <!--FIRST CHILD TO DISPLAY NAVIGATIONA BAR-->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="./images/logo.png" alt="logo" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?>$</a>
                        </li>

                    </ul>
                    <form class="d-flex" action="search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" name="search_data"
                            aria-label="Search">
                        <input type="submit" class="btn btn-outline-light" name="search_data_product" value="Search">

                    </form>
                </div>
            </div>
        </nav>

        <!--calling cart function-->
        <?php
        cart();
        ?>

        <!--SECOND CHILD TO USERNAME DISPLAY-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link">Welcome Guest</a>
                </li>
                <li class="nav-item">
                    <a href="./User/user_login.php" class="nav-link">Login</a>
                </li>
            </ul>
        </nav>

        <!--THIRD CHILD TO STORE NAME-->
        <div class="bg-light">
            <h3 class="text-center ">Nikesh Store</h3>
            <p class="text-center">
                Communication is at the heart of e-commerce and community.
            </p>
        </div>

        <!--FOURTH CHILD TO PRODUCT-->
        <div class="row px-1">
            <div class="col-md-10">
                <!--PRODUCTS-->
                <div class="row">
                    <!--Featching product-->
                    <?php
                    //calling function
                    getproducts();
                    get_unique_categories();
                    get_unique_brands();
                    // $ip = getIPAddress();
                    // echo "<script>alert('USER REAL IP Address =' . $ip);</script>";
                    ?>
                    <!--row end-->
                </div>
                <!--Column end-->
            </div>

            <!--SIDE-NAV-->
            <div class="col-md-2 bg-secondary p-0">
                <!--BRANDS TO BE DISPLAY-->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h5>Delivery Brands</h5>
                        </a>
                    </li>
                    <?php
                    getbrands();
                    ?>
                </ul>
                <!--CATEGORY TO BE DISPLAYED-->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h5>Categories</h5>
                        </a>
                    </li>
                    <?php
                    getcategories();
                    ?>

                </ul>
            </div>
        </div>

        <!--FOOTER-->
        <!--include footer-->
        <?php
        include('./includes/footer.php');
        ?>
    </div>
</body>

</html>