<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- BOOTSTRAP CSS LINK-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>

<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2>
        <div class="row d-fllex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <!--Username feild-->
                        <label class="form-label" for="user_username">Username</label>
                        <input type="text" id="user_username" name="user_username" class="form-control" placeholder="Enter Your Username" autocomplete="off" required/>
                    </div>
                                         
                    <!--Password feild-->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="user_password">Password</label>
                        <input type="password" id="user_password" name="user_password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required/>
                    </div>
                    <!--Submit button-->
                    <div class="mt-4 pt-2">
                    <input type="button" value="Login" name="user_login" class="bg-info py-2 px-3 border-0">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account ?<a href="user_registration.php" class="text-danger"> Register</a></p>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>

</html>