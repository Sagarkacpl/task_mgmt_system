<?php 
session_start();
error_reporting(0);
include('include/dbconn.php');
$admin_id = $_SESSION['admin_id'];
if(empty($admin_id))
{
    header("Location: index.php");
}
$record_id = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Edit Department</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    
    <!-- Plugins css -->
    <link href="../plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />


    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/theme.min.css" rel="stylesheet" type="text/css" />

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
                                <h4 class="mb-0 font-size-18">Edit Department</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                        <li class="breadcrumb-item active">Edit Department</li>
                                    </ol>
                                </div>                                
                            </div>
                        </div>
                    </div>     
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xl-3"></div>
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <?php 
                                        $edit_dptmnt = mysqli_query($db,"SELECT * FROM `department` WHERE ID='$record_id' AND deletedStatus='0'");
                                        $read = mysqli_fetch_assoc($edit_dptmnt);
                                    ?>
                                    <form  method="post">
                                        <div class="form-group">
                                            <label>Department Name</label>
                                            <input type="text" class="form-control" maxlength="25" name="departmentName" id="defaultconfig" value="<?php echo $read['department_name'] ?>" placeholder="Enter Department Name"/>
                                        </div>
                                        <button type="submit" name="add_Department" class="btn btn-primary mt-2">Update</button>    
                                    </form>
                                    <?php 
                                        if(isset($_POST['add_Department']) && isset($_POST['departmentName']))
                                           {
                                                $departmentName = mysqli_real_escape_string($db,$_POST['departmentName']);
                                                $added_by = $_SESSION['admin_name'];
                                                $department = mysqli_query($db,"UPDATE `department` SET `department_name` = '$departmentName', `added_by` = '$added_by' WHERE ID = '$record_id'");
                                                if($department == TRUE)
                                                {
                                                    echo "<script>alert('Department Has Been Edited Successfully')</script>";
                                                    echo "<script>window.location.href='department.php'</script>";
                                                }
                                                else
                                                {
                                                    echo "<script>alert('Department Not Edit , Something Wrong')</script>";
                                                }
                                        }
                                    ?>
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->                            
                        </div> <!-- end col -->
                        <div class="col-xl-3"></div>
                    </div>
                    <!-- end row-->


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

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metismenu.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/simplebar.min.js"></script>

     <!-- Plugins js -->
     <script src="../plugins/autonumeric/autoNumeric-min.js"></script>
     <script src="../plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
     <script src="../plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
     <script src="../plugins/moment/moment.js"></script>
     <script src="../plugins/daterangepicker/daterangepicker.js"></script>
     <script src="../plugins/select2/select2.min.js"></script>
     <script src="../plugins/switchery/switchery.min.js"></script>
     <script src="../plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
     <script src="../plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
 
     <!-- Custom Js -->
     <script src="assets/pages/advanced-plugins-demo.js"></script>

    <!-- App js -->
    <script src="assets/js/theme.js"></script>

   

</body>

</html>