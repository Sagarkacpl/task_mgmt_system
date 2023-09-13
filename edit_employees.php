<?php 
session_start();
error_reporting(0);
include('include/dbconn.php');
$admin_id = $_SESSION['admin_id'];
if(empty($admin_id))
{
    header("Location: index.php");
}
$employee_id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Edit Employee</title>
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
    <div id="layout-wrapper">
        <?php include('include/header.php'); ?>
        <!-- ========== Left Sidebar Start ========== -->
        <?php include('include/navbar.php'); ?>
        <!-- Left Sidebar End -->
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18">Edit Employee</h4>
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active">Edit Employee</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <?php 
                                        $employee = mysqli_query($db,"SELECT * FROM `users` WHERE DeletedStatus='0' AND ID='$employee_id'");
                                        $read2 = mysqli_fetch_assoc($employee);
                                    ?>
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Employee ID </label>
                                                    <input type="text" name="emp_id" class="form-control" value="<?php echo $read2['Emp_id'] ?>" placeholder="Employee ID">
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="emp_name" class="form-control" value="<?php echo $read2['Name'] ?>"
                                                        placeholder="Employee Name">
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Email ID</label>
                                                    <input type="text" name="emp_email" class="form-control" value="<?php echo $read2['Email'] ?>"
                                                        placeholder="Email ID">
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Phone No</label>
                                                    <input type="text" name="emp_phone" class="form-control" value="<?php echo $read2['Phone_no'] ?>"
                                                        placeholder="Phone No">
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Department</label>
                                                    <select name="emp_deptment" id="" class="form-control">
                                                        <option>Select Department</option>
                                                        <?php
                                                            $selectedDepartment = $read2['Emp_deptment']; // Assuming you have a selected department value
                                                            
                                                            $departments = mysqli_query($db, "SELECT * FROM `department` WHERE deletedStatus='0'");
                                                            while ($read = mysqli_fetch_assoc($departments)) {
                                                                $departmentName = htmlspecialchars($read['department_name']);
                                                                $isSelected = ($departmentName == $selectedDepartment) ? 'selected' : '';
                                                                echo '<option value="' . $departmentName . '" ' . $isSelected . '>' . $departmentName . '</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Designation</label>
                                                    <select name="emp_designation" id="" class="form-control">
                                                        <option>Select Designation</option>
                                                        <?php
                                                            $selectedDesignation = $read2['Emp_designation']; // Assuming you have a selected designation value
                                                            
                                                            $designations = mysqli_query($db, "SELECT * FROM `designation` WHERE deletedStatus='0'");
                                                            while ($read = mysqli_fetch_assoc($designations)) {
                                                                $designationName = htmlspecialchars($read['designation_name']);
                                                                $isSelected = ($designationName == $selectedDesignation) ? 'selected' : '';
                                                                echo '<option value="' . $designationName . '" ' . $isSelected . '>' . $designationName . '</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Reporting Member</label>
                                                    <input type="text" name="emp_reporting" class="form-control" value="<?php echo $read2['Emp_reporting'] ?>" placeholder="Reporting Member Name">
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Date of Joining </label>
                                                    <input type="date" name="emp_joining_date" id="" value="<?php echo $read2['Emp_joining_date'] ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Date of Birth </label>
                                                    <input type="date" name="emp_dob" value="<?php echo $read2['Date_of_Birth'] ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Password </label>
                                                    <input type="password" name="emp_password" id="" class="form-control" placeholder="Update Employee Login Password">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button class="btn btn-success" type="submit"
                                                        name="save">Submit</button>
                                                </div>
                                            </div>
                                    </form>
                                    <?php 
                                        if(isset($_POST['save']))
                                        {
                                            $emp_id = mysqli_real_escape_string($db,$_POST['emp_id']);
                                            $emp_name = mysqli_real_escape_string($db,$_POST['emp_name']);
                                            $emp_email = mysqli_real_escape_string($db,$_POST['emp_email']);
                                            $emp_phone = mysqli_real_escape_string($db,$_POST['emp_phone']);
                                            $emp_deptment = mysqli_real_escape_string($db,$_POST['emp_deptment']);
                                            $emp_designation = mysqli_real_escape_string($db,$_POST['emp_designation']);
                                            $emp_reporting = mysqli_real_escape_string($db,$_POST['emp_reporting']);
                                            $emp_joining_date = mysqli_real_escape_string($db,$_POST['emp_joining_date']);
                                            $emp_dob = mysqli_real_escape_string($db,$_POST['emp_dob']);
                                            $emp_password = '';

                                            // Check if a new password is provided
                                            if (!empty($_POST['emp_password'])) {
                                                $emp_password = md5($_POST['emp_password']);
                                            } else {
                                                // If no new password is provided, use the existing password
                                                $emp_password = $read2['Password'];
                                            }

                                            $edit_employee = mysqli_query($db,"UPDATE `users` SET `Emp_id` = '$emp_id', `Name` = '$emp_name', `Phone_no` = '$emp_phone', `Email` = '$emp_email', `Password` = '$emp_password', `Emp_deptment` = '$emp_deptment', `Emp_designation` = '$emp_designation', `Date_of_Birth` = '$emp_dob', `Emp_reporting` = '$emp_reporting' WHERE `ID` = '$employee_id'");
                                            if($edit_employee == TRUE)
                                            {
                                                echo "<script>alert('New Employee Update Sucessfully');window.location.href='employee.php';</script>";
                                            }
                                            else
                                            {
                                                echo "<script>alert('Employee Not Updated, Try Again')</script>";
                                            }
                                            
                                        }
                                    ?>
                                    <!-- end row -->
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row-->
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            
        </div>
        <!-- end main content-->
        <?php include('include/footer.php') ?>
    </div>
    <!-- end page -->
    <!-- jQuery  -->
    <script src="https://ims.acpldemo.co.in/public/admin_assets/js/jquery.min.js"></script>
    <script src="https://ims.acpldemo.co.in/public/admin_assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://ims.acpldemo.co.in/public/admin_assets/js/metismenu.min.js"></script>
    <script src="https://ims.acpldemo.co.in/public/admin_assets/js/waves.js"></script>
    <script src="https://ims.acpldemo.co.in/public/admin_assets/js/simplebar.min.js"></script>
    <script src="https://ims.acpldemo.co.in/public/admin_assets/js/morris.min.js"></script>
    <script src="https://ims.acpldemo.co.in/public/admin_assets/js/raphael.min.js"></script>
    <script src="https://ims.acpldemo.co.in/public/admin_assets/js/jquery.dataTables.min.js"></script>
    <!-- App js -->
    <script src="https://ims.acpldemo.co.in/public/admin_assets/js/theme.js"></script>
    <script>
        $(document).ready(function () {
            $('#amcTable').DataTable();
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.3/js/bootstrap-select.js"></script>
    <script>
        $(document).ready(function () {
            // Assuming your radio button has the name="radio"
            $("input[name='project_type']").on("change", function () {
                var selectedOption = $(this).val();
                if (selectedOption === "Recurring") {
                    $("#recurring-form").show();
                    $("#onetime-form").hide();
                } else if (selectedOption === "OneTime") {
                    $("#onetime-form").show();
                    $("#recurring-form").hide();
                } else {
                    $("#recurring-form").hide();
                    $("#onetime-form").hide();
                }
            });
        });
    </script>
</body>
</html>