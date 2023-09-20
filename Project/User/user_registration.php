<?php
include("../includes/connect.php");
include("../functions/common_function.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- BOOTSTRAP CSS LINK-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>

<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-fllex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <!--Username feild-->
                        <label class="form-label" for="user_username">Username</label>
                        <input type="text" id="user_username" name="user_username" class="form-control"
                            placeholder="Enter Your Username" autocomplete="off" required />
                    </div>
                    <!--Email feild-->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="user_email">Email</label>
                        <input type="email" id="user_email" name="user_email" class="form-control"
                            placeholder="Enter Your Email" autocomplete="off" required />
                    </div>
                    <!--Image feild-->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="user_image">User Image</label>
                        <input type="file" id="user_image" name="user_image" class="form-control" required />
                    </div>
                    <!--Password feild-->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="user_password">Password</label>
                        <input type="password" id="user_password" name="user_password" class="form-control"
                            placeholder="Enter Your Password" autocomplete="off" required />
                    </div>
                    <!--Confirm Password feild-->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="conf_user_password">Confirm Password</label>
                        <input type="password" id="conf_user_password" name="conf_user_password" class="form-control"
                            placeholder="Confirm Your Password" autocomplete="off" required />
                    </div>
                    <!--Address Feild-->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="user_address">Address</label>
                        <input type="text" id="user_address" name="user_address" class="form-control"
                            placeholder="Enter Your Address" autocomplete="off" required />
                    </div>
                    <!--Phone feild-->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="user_contact">Phone</label>
                        <input type="text" id="user_contact" name="user_contact" class="form-control"
                            placeholder="Enter Your Phone" autocomplete="off" required />
                    </div>

                    <!--Submit button-->
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" name="user_register" class="bg-info py-2 px-3 border-0">

                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ? <a href="user_login.php"
                                class="text-danger"> Login</a></p>
                    </div>

                </form>
            </div>
        </div>

    </div>
</body>

</html>
<!--php -->
<?php
if (isset($_POST['user_register'])) {
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $conf_user_password = $_POST['user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();

    //insert_query
    move_uploaded_file($user_image_temp, "./user_images/$user_image");
    $query = "INSERT INTO user_table (user_name,user_email,user_password,user_image,user_ip,user_address,user_mobile)
        VALUES('$user_username','$user_email','$user_password','$user_image','$user_ip','$user_address','$user_contact')";
    $sql_execute = mysqli_query($con, $query);
    if ($sql_execute) {
        echo "<script>alert('User Registered Successfully');</script>";
    } else {
        die(mysqli_error($con));
    }
}
?>