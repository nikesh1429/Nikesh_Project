<?php
include("../includes/connect.php");
if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $product_keyword = $_POST['product_keywords'];
    $product_category = $_POST['product_categories'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];
    $product_status = "true";
    //ACCESSING IMAGES 
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    //ACCESSING IMAGE TMP NAME
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    //CHECKING EMPTY CONDITION
    if (empty($product_title) || empty($description) || empty($product_keyword) || empty($product_category) || empty($product_brands) || empty($product_price) || empty($product_image1) || empty($product_image2) || empty($product_image3) || empty($product_status)) {
        echo "<script>alert('Please fill all the fields');</script>";
        exit();
    } else {
        move_uploaded_file($temp_image1, "./products_images/$product_image1");
        move_uploaded_file($temp_image2, "./products_images/$product_image2");
        move_uploaded_file($temp_image3, "./products_images/$product_image3");
    }


    //INSERT QUERY
    $insert_products = "INSERT INTO `products` (product_title, product_description, product_keywords, category_id, brand_id, product_image1, product_image2, product_image3, product_price, date, status) VALUES ('$product_title', '$description', '$product_keyword', '$product_category', '$product_brands', '$product_image1', '$product_image2', '$product_image3', '$product_price', NOW(), '$product_status')";

    $result_query = mysqli_query($con, $insert_products);
    if ($result_query) {
        echo "<script>alert('Product Inserted Successfully');</script>";
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>
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
    <link rel="stylesheet" href="../style.css">
</head>

<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!--FORM-->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- TITLE -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control"
                    placholder="Enter Product Title" autocomplet="off" required="required">
            </div>
            <!-- DESCRIPTION -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product Description</label>
                <input type="text" name="description" id="description" class="form-control"
                    placholder="Enter Product Description" autocomplet="off" required="required">
            </div>
            <!-- KEYWORDS -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control"
                    placholder="Enter Product Keywords" autocomplet="off" required="required">
            </div>
            <!-- CHOOSE CATEGORY -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_categories" id="" class="form-select">
                    <option value="">Select Category</option>
                    <?php
                    $select_query = "SELECT * FROM categories";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $category_title = $row['category_title'];
                        $category_id = $row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- CHOOSE BRANDS -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id="" class="form-select">
                    <option value="">Select Brands</option>
                    <?php
                    $select_query = "SELECT * FROM brands";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $brand_title = $row['brand_title'];
                        $brand_id = $row['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>
                </select>
            </div>
            <!-- IMAGE 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product IMAGE 1</label>
                <input type="file" name="product_image1" class="form-control" placholder="Enter Product Keywords"
                    required="required">
            </div>
            <!-- IMAGE 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product IMAGE 2</label>
                <input type="file" name="product_image2" class="form-control" required="required">
            </div>
            <!-- IMAGE 3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product IMAGE 3</label>
                <input type="file" name="product_image3" class="form-control" required="required">
            </div>

            <!-- PRICES -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control"
                    placholder="Enter Product Price" autocomplet="off" required="required">
            </div>

            <!-- PRICES -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
            </div>

        </form>
    </div>
</body>

</html>