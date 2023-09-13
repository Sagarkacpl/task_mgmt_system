<?php 
    session_start();
    error_reporting(0);
    include('include/dbconn.php');
    $admin_id = $_SESSION['admin_id'];
    if($admin_id == TRUE )
    {
        header("Location: dashboard.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Lunoz - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="MyraStudio" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
    
        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/theme.min.css" rel="stylesheet" type="text/css" />
    
    </head>

<body class="bg-primary">

    <div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center min-vh-100">
                        <div class="w-100 d-block my-5">
                            <div class="row justify-content-center">
                                <div class="col-md-8 col-lg-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-center mb-4 mt-3">
                                                <a href="index.php">
                                                    <span><img src="assets/images/logo-dark.png" alt="" height="26"></span>
                                                </a>
                                            </div>
                                            <form class="p-2" method="POST">
                                                <div class="form-group">
                                                    <label for="emailaddress">Email address</label>
                                                    <input class="form-control" type="email" name="email" id="emailaddress" required="" placeholder="Enter Email ID" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input class="form-control" type="password" name="password" required="" id="password" placeholder="Enter Password" autocomplete="off">
                                                </div>
                                                <div class="mb-3 text-center">
                                                    <button class="btn btn-primary btn-block" name="login" type="submit"> Sign In </button>
                                                </div>
                                            </form>
                                            <?php 
                                                if(isset($_POST['email']) && isset($_POST['password'])){
                                                    $mail = mysqli_real_escape_string($db,$_POST['email']);
                                                    $password = md5(trim($_POST['password']));
                                                    $DeletedStatus = 0;
                                                
                                                    // Query to check if the user exists and retrieve user data
                                                    $query = 'SELECT * FROM `users` WHERE Email="'.$mail.'" AND Password="'.$password.'" AND DeletedStatus="'.$DeletedStatus.'" ';
                                                    $result = mysqli_query($db, $query);
                                                
                                                    if(mysqli_num_rows($result) > 0) {
                                                        $row = mysqli_fetch_array($result);
                                                
                                                        if($row['is_admin'] == 2) {
                                                            // Admin login
                                                            $_SESSION['admin_email'] = $row['Email'];
                                                            $_SESSION['admin_id'] = $row['ID'];
                                                            $_SESSION['admin_name'] = $row['Name'];
                                                            $_SESSION['status'] = $row['is_admin'];
                                                            echo '<div class="alert alert-info mt-3" id="register_en">Admin Login Success Redirect......</div>';
                                                            echo "<script>window.location.href='dashboard.php'</script>";
                                                        } elseif($row['is_admin'] == 1) {
                                                            // Manager login
                                                            $_SESSION['admin_email'] = $row['Email'];
                                                            $_SESSION['admin_id'] = $row['ID'];
                                                            $_SESSION['admin_name'] = $row['Name'];
                                                            $_SESSION['status'] = $row['is_admin'];
                                                            echo '<div class="alert alert-info mt-3" id="register_en">Manager Login Success Redirect......</div>';
                                                            echo "<script>window.location.href='dashboard.php'</script>";
                                                        } elseif($row['is_admin'] == 0) {
                                                            // Employee login
                                                            $_SESSION['admin_email'] = $row['Email'];
                                                            $_SESSION['admin_id'] = $row['ID'];
                                                            $_SESSION['admin_name'] = $row['Name'];
                                                            $_SESSION['status'] = $row['is_admin'];
                                                            echo '<div class="alert alert-info mt-3" id="register_en">Employee Login Success Redirect......</div>';
                                                            echo "<script>window.location.href='dashboard.php'</script>";
                                                        }
                                                    } else {
                                                        echo '<div class="alert alert-danger mt-3" id="register_en">User Does Not Exist.</div>';
                                                    }
                                                }
                                                
                                            ?>
                                        </div>
                                        <!-- end card-body -->
                                    </div>
                                    <!-- end card -->
            
            
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div> <!-- end .w-100 -->
                    </div> <!-- end .d-flex -->
                </div> <!-- end col-->
            </div> <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metismenu.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/simplebar.min.js"></script>

    <!-- App js -->
    <script src="assets/js/theme.js"></script>

</body>

</html>