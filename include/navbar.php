<?php  
$nav_bar_valdate = mysqli_query($db,"SELECT * FROM `users` WHERE is_admin=$_SESSION[status]"); 
$read = mysqli_fetch_assoc($nav_bar_valdate);
?>

<div class="vertical-menu">
            <div data-simplebar class="h-100">
                <div class="navbar-brand-box">
                    <a href="index.html" class="logo">
                        <img src="assets/images/logo-light.png" />
                    </a>
                </div>
                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Menu</li>
                        <li><a href="dashboard.php" class="waves-effect"><i class='bx bx-home-smile'></i><span>Dashboard</span></a></li>
                        <?php if($read['is_admin'] == 2 ){ ?>
                            <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bx-file"></i><span>Master</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="department.php">Department</a></li>
                                <li><a href="designation.php">Designation</a></li>
                                <li><a href="report_member.php">Reporting Member</a></li>
                            </ul>
                        </li>

                            <li><a href="employee.php" class="waves-effect"><i class='bx bx-user'></i><span>Employee</span></a></li>

                        <?php } ?>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>