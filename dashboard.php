<?php 
session_start();
error_reporting(0);
include('include/dbconn.php');
$admin_id = $_SESSION['admin_id'];
if(empty($admin_id))
{
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard</title>
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

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

    <!-- ========== Header Start ========== -->
    <?php include('include/header.php') ?>
    <!-- ========== Header End ========== -->
       
        <!-- ========== Left Sidebar Start ========== -->
        <?php include('include/navbar.php') ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18">Dashboard</h4>

                                
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Lunoz</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <i class="bx bx-layer float-right m-0 h2 text-muted"></i>
                                    <h6 class="text-muted text-uppercase mt-0">Orders</h6>
                                    <h3 class="mb-3" data-plugin="counterup">1,587</h3>
                                    <span class="badge badge-success mr-1"> +11% </span> <span class="text-muted">From previous period</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <i class="bx bx-dollar-circle float-right m-0 h2 text-muted"></i>
                                    <h6 class="text-muted text-uppercase mt-0">Revenue</h6>
                                    <h3 class="mb-3">$<span data-plugin="counterup">46,782</span></h3>
                                    <span class="badge badge-danger mr-1"> -29% </span> <span class="text-muted">From previous period</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <i class="bx bx-bx bx-analyse float-right m-0 h2 text-muted"></i>
                                    <h6 class="text-muted text-uppercase mt-0">Average Price</h6>
                                    <h3 class="mb-3">$<span data-plugin="counterup">15.9</span></h3>
                                    <span class="badge badge-warning mr-1"> 0% </span> <span class="text-muted">From previous period</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <i class="bx bx-basket float-right m-0 h2 text-muted"></i>
                                    <h6 class="text-muted text-uppercase mt-0">Product Sold</h6>
                                    <h3 class="mb-3" data-plugin="counterup">1,890</h3>
                                    <span class="badge badge-success mr-1"> +89% </span> <span class="text-muted">Last year</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                 

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <?php include('include/footer.php') ?>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Overlay-->
    <div class="menu-overlay"></div>


    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metismenu.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/simplebar.min.js"></script>

    <!-- Morris Js-->
    <script src="../plugins/morris-js/morris.min.js"></script>
    <!-- Raphael Js-->
    <script src="../plugins/raphael/raphael.min.js"></script>

    <!-- Morris Custom Js-->
    <script src="assets/pages/dashboard-demo.js"></script>

    <!-- App js -->
    <script src="assets/js/theme.js"></script>

</body>

</html>