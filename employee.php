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
    <title>Employees </title>
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

    <!-- Data Table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <?php include('include/header.php') ?>

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
                                <h4 class="mb-0 font-size-18">Employees List</h4>

                                <div class="page-title-right">
                                    <a href="" class="btn btn-primary">Add New Employee</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>     
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xl-12">
                        <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table mb-0" id='emptTable'>
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Employee Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $show_emp = mysqli_query($db,"SELECT * FROM `users` WHERE is_admin = '0' AND DeletedStatus='0' ORDER BY ID DESC");
                                                    $count = 1;
                                                    while($read = mysqli_fetch_assoc($show_emp))
                                                    {
                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $count; ?></th>
                                                    <td><?php echo $read['Name'] ?></td>
                                                    <td><?php echo $read['Email'] ?></td>
                                                    <td><?php echo $read['Phone_no'] ?></td>
                                                    <td>
                                                        <div class="">
                                                            <a href="#" onclick="return confirm('Are You Sure You Want To Edit This Record ?');" class="btn btn-success"><i class="bx bx-pencil"></i></a>
                                                            <a href="#" onclick="return confirm('Are You Sure You Want To Delete This Record ?');" class="btn btn-danger">
                                                                <i class="bx bx-trash"></i>
                                                            </a>
                                                            
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php } $count++;?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            <!-- end card -->

                        </div>
                        <!-- end col -->
                    </div>



                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            2020 © Lunoz.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-right d-none d-sm-block">
                                Design & Develop by Myra
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

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

    <!-- App js -->
    <script src="assets/js/theme.js"></script>

    <!-- Data Table -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        let table = new DataTable('#emptTable');
    </script>

</body>

</html>