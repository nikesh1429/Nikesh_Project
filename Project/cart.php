<?php
include('includes/connect.php');
include('functions/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Details</title>
    <!-- BOOTSTRAP CSS LINK-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- FONT AWES-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--JAVASCRIPT LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
        </script>
    <!--INTERNAL STYLE SHEET-->
    <link rel="stylesheet" href="style.css">
    <style>
        .cart_img {
            width: 50px;
            height: 50px;
            object-fit: contain;
        }
    </style>
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
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
                                    <?php cart_item(); ?>
                                </sup></a>
                        </li>

                    </ul>

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
                    <a href="#" class="nav-link">Login</a>
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
        <!--fourth child table-->
        <div class="container">
            <div class="row">
                <form action="" method="post">
                    <table class="table table-bordered text-center">

                        <!-- PHP code to display dynamic data -->
                        <?php
                        global $con;
                        $get_ip = getIPAddress();
                        $total_price = 0;
                        $cart_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip'";
                        $result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo "<thead>
                                <tr>
                                    <th>Product Title</th>
                                    <th>Product Image</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Remove</th>
                                    <th colspan='2'>Operations</th>
                                </tr>
                            </thead>
                            <tbody>";
                            while ($row = mysqli_fetch_array($result)) {
                                $product_id = $row['product_id'];
                                $select_products = "SELECT * FROM products WHERE product_id='$product_id'";
                                $result_products = mysqli_query($con, $select_products);
                                while ($row_products_price = mysqli_fetch_array($result_products)) {
                                    $product_title = $row_products_price['product_title'];
                                    $product_image1 = $row_products_price['product_image1'];
                                    $product_price = $row_products_price['product_price'];

                                    $product_values = $product_price; // Assuming you want to display the individual product price here.
                                    $total_price += $product_values;
                                    ?>

                                    <tr>
                                        <td>
                                            <?php echo $product_title; ?>
                                        </td>

                                        <td><img src="./images/<?php echo $product_image1; ?>" alt="" class="cart_img"></td>

                                        <td><input type="text" name="qty" class="form-input w-50"></td>

                                        <?php
                                        $get_ip = getIPAddress();
                                        if (isset($_POST['update_cart']) && (isset($_POST['qty'])) && trim($_POST['qty'] != '')) {
                                            $quantities = $_POST['qty'];
                                            $update_cart = "update cart_details set quantity=$quantities where ip_address='$get_ip'";
                                            $result_products_quantity = mysqli_query($con, $update_cart);
                                            $total_price = $total_price * $quantities;
                                        }
                                        ?>

                                        <!-- You may want to use a dynamic quantity here -->
                                        <td>
                                            <?php echo '$' . $product_values; ?>
                                        </td>

                                        <td>
                                            <input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>">
                                        </td>

                                        <td>
                                            <input type="submit" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart"
                                                value="Update Cart">

                                            <input type="submit" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart"
                                                value="Remove Cart">
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                        } else {
                            echo "<h2 class='text-center text-danger'>Cart is Empty</h2>";
                        }
                        ?>

                        </tbody>
                    </table>
                    <!-- SUBTOTAL -->

                    <div class="d-flex mb-5">
                        <?php
                        $get_ip = getIPAddress();
                        $cart_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip'";
                        $result = mysqli_query($con, $cart_query) or die(mysqli_error($con)); // Add error handling
                        
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo "<h4 class='px-3'>Subtotal: <strong class='text-info'>$$total_price</strong></h4>
                                <input type='submit' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'
                                value='Countinue Shopping'>
                                <button class='bg-secondary p-3 py-2 border-0'><a class='text-light text-decoration-none' href='./User/checkout.php'>Checkout</a></button>";
                        } else {
                            echo " <input type='submit' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'
                            value='Countinue Shopping'>";
                        }
                        if (isset($_POST['continue_shopping'])) {
                            echo "<script>window.open('index.php','_self')</script>";
                        }
                        ?>

                    </div>

            </div>
        </div>
        </form>


        <!--Function to remove items-->
        <?php
        function remove_cart_item()
        {
            global $con;
            if (isset($_POST['remove_cart'])) {
                foreach ($_POST['removeitem'] as $remove_id) {
                    echo $remove_id;
                    $delete_query = "Delete from cart_details where product_id=$remove_id";
                    $run_delete = mysqli_query($con, $delete_query);
                    if ($run_delete) {
                        echo "<script>alert('Item removed from cart')</script>";
                        echo "<script>window.open('cart.php','_self')</script>";


                    }
                }
            }

        }
        echo $remove_item = remove_cart_item();
        
        ?>



        <!--FOOTER-->
        <!--include footer-->
        <?php
        include('./includes/footer.php');
        ?>
    </div>
</body>

</html>