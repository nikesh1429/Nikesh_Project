<?php
//include('./includes/connect.php');

//getting products
function getproducts()
{
    global $con;
    //condition to check isset or not
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select_query = "Select * from products order by rand() LIMIT 0,9";
            $result_query = mysqli_query($con, $select_query);
            //$row=mysqli_fetch_assoc($result_query);
            //echo $row['product_title'];
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                                <img class='card-img-top' src='./Admin/products_images/$product_image1' alt='Card image cap'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <p class='card-text'>Price: $product_price$</p>
                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                                </div>
                     </div>
                </div>";
            }

        }
    }
}
//getting all products
function get_All_products()
{
    global $con;
    //condition to check isset or not
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select_query = "Select * from products order by rand()";
            $result_query = mysqli_query($con, $select_query);
            //$row=mysqli_fetch_assoc($result_query);
            //echo $row['product_title'];
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                                <img class='card-img-top' src='./Admin/products_images/$product_image1' alt='Card image cap'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <p class='card-text'>Price: $product_price$</p>
                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                                </div>
                     </div>
                </div>";
            }

        }
    }
}


//getting unique categories
function get_unique_categories()
{
    global $con;

    // Check if the "category" query parameter is set
    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];

        // You should also consider validating and sanitizing the input to prevent SQL injection.

        // Query products based on the specified category
        $select_query = "SELECT * FROM products WHERE category_id = $category_id";
        $result_query = mysqli_query($con, $select_query);

        $number_of_rows = mysqli_num_rows($result_query);
        if ($number_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>No Stock This Category";
        }

        // Loop through the results and display products
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];

            // Output HTML for displaying the product (similar to your original code)
            echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                                <img class='card-img-top' src='./Admin/products_images/$product_image1' alt='Card image cap'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <p class='card-text'>Price: $product_price$</p>
                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                                </div>
                     </div>
                </div>";
        }
    }
}

//getting unique brands
function get_unique_brands()
{
    global $con;

    // Check if the "category" query parameter is set
    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];

        // You should also consider validating and sanitizing the input to prevent SQL injection.

        // Query products based on the specified category
        $select_query = "SELECT * FROM products WHERE brand_id = $brand_id";
        $result_query = mysqli_query($con, $select_query);

        $number_of_rows = mysqli_num_rows($result_query);
        if ($number_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>This brand Not Brand Availabel for services";
        }

        // Loop through the results and display products
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];

            // Output HTML for displaying the product (similar to your original code)
            echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                                <img class='card-img-top' src='./Admin/products_images/$product_image1' alt='Card image cap'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <p class='card-text'>Price: $product_price$</p>
                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                                </div>
                     </div>
                </div>";
        }
    }
}




//displaying brands in sidnav

function getbrands()
{
    global $con;
    $select_brands = "select * from brands";
    $result_brands = mysqli_query($con, $select_brands);
    // $row_data=mysqli_fetch_assoc($result_brands);
    // echo $row_data['brand_title'];
    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        echo "<li class='nav-item'>
                        <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
                    </li>";
    }

}
//displaying categories in sidnav
function getcategories()
{
    global $con;
    $select_categories = "select * from categories";
    $result_categories = mysqli_query($con, $select_categories);
    while ($row_data = mysqli_fetch_assoc($result_categories)) {
        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];
        echo "<li class='nav-item'>
                        <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
                    </li>";
    }
}

//searching products
function search_product()
{
    global $con;
    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
        // Condition to check isset or not
        $search_query = "SELECT * FROM products WHERE product_keywords LIKE '%$search_data_value%'";
        $result_query = mysqli_query($con, $search_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>No Products Found";
        }

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];

            // Output HTML for displaying the product (similar to your previous code)
            echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                                <img class='card-img-top' src='./Admin/products_images/$product_image1' alt='Card image cap'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <p class='card-text'>Price: $product_price$</p>
                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                                </div>
                     </div>
                </div>";
        }
    }
}

//view details functions

function view_details()
{
    global $con;
    //condition to check isset or not
    if (isset($_GET['product_id'])) {
        if (!isset($_GET['category'])) {
            if (!isset($_GET['brand'])) {
                $product_id = $_GET['product_id'];
                $select_query = "Select * from products where product_id=$product_id";
                $result_query = mysqli_query($con, $select_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_image1 = $row['product_image1'];
                    $product_image2 = $row['product_image2'];
                    $product_image3 = $row['product_image3'];
                    $product_price = $row['product_price'];
                    $category_id = $row['category_id'];
                    $brand_id = $row['brand_id'];
                    echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                                <img class='card-img-top' src='./Admin/products_images/$product_image1' alt='Card image cap'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <p class='card-text'>Price: $product_price$</p>
                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                    <a href='index.php' class='btn btn-secondary'>Go Home</a>
                                </div>
                     </div>
                </div>
                
                <div class='col-md-8'>
                        <div class='row'>
                            <div class='col-md-12'>
                                <h4 class='text-center text-info mb-5'>Related Products</h4>
                            </div>
                            <div class='col-md-6'>
                            <img class='card-img-top' src='./Admin/products_images/$product_image2' alt='Card image cap'>

                            </div>
                            <div class='col-md-6'>
                            <img class='card-img-top' src='./Admin/products_images/$product_image3' alt='Card image cap'>
                            </div>
                        </div>

                    </div>";
                }

            }
        }
    }
}

//get ip address function
function getIPAddress()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
// $ip=getIPAddress();
// echo "USER REAL IP Address =".$ip;

//cart function
function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;

        // Check if 'add_to_cart' is set in the URL parameters
        $get_ip = getIPAddress();
        $product_id = $_GET['add_to_cart'];

        // Check if the product is already in the cart for this IP address
        $select_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip' AND product_id=$product_id";
        $result_query = mysqli_query($con, $select_query);

        $num_of_rows = mysqli_num_rows($result_query);

        if ($num_of_rows > 0) {
            // Product is already in the cart
            echo "<script>alert('Product is already in the cart.')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            $insert_query = "INSERT INTO `cart_details` (product_id, ip_address, quantity) VALUES ($product_id, '$get_ip', 0)";
            $result_query = mysqli_query($con, $insert_query);
            echo "<script>alert('Product is Inserted Successfully.')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}

//function to get cart item number
function cart_item(){
    if (isset($_GET['add_to_cart'])) {
        global $con;

        // Check if 'add_to_cart' is set in the URL parameters
        $get_ip = getIPAddress();

        // Check if the product is already in the cart for this IP address
        $select_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip'";
        $result_query = mysqli_query($con, $select_query);

        $count_cart_items = mysqli_num_rows($result_query);
    }else {
        global $con;

        // Check if 'add_to_cart' is set in the URL parameters
        $get_ip = getIPAddress();

        // Check if the product is already in the cart for this IP address
        $select_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip'";
        $result_query = mysqli_query($con, $select_query);

        $count_cart_items = mysqli_num_rows($result_query);
        }
        echo  $count_cart_items;
    }


    //total price function
function total_cart_price(){
    global $con;
    $get_ip=getIPAddress();
    $total=0;
    $cart_query="select * from cart_details where ip_address='$get_ip'";
    $result=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result)){
        $product_id=$row['product_id'];
        $select_products="select * from products where product_id='$product_id'";
        $result_products=mysqli_query($con,$select_products);
        while($row_products_price=mysqli_fetch_array($result_products)){
            $product_price=array($row_products_price['product_price']);
            $product_values=array_sum($product_price);
            $total=$total+$product_values;

        }

    }
    echo $total;


}

?>