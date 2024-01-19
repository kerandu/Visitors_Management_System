<?php
session_start();
error_reporting(0);
include('includes/dbconnect.php');
if (strlen($_SESSION['khuvmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$khuvmsaid=$_SESSION['khuvmsaid'];

$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$address=$_POST['address'];
$whomtomeet=$_POST['whomtomeet'];
$department=$_POST['department'];
$reason=$_POST['reason'];
 $query=mysqli_query($con,"insert into visitor(name,email,mobile,address,whomtomeet,department,reason) value('$name','$email','$mobile','$address','$whomtomeet','$department','$reason')");

    if ($query) {
    $msg="Visitor details have been added";
  }
  else
  {
    $msg1="oops! Something went wrong, please try again";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>New Visitor | KHU-VMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is the main dashboard to the Visitors' Management System.">
    <meta name="msapplication-tap-highlight" content="no">
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<link href="./main.css" rel="stylesheet"></head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>    <div class="app-header__content">
                <div class="app-header-left">
                    <!--Search form-->
                    <div class="search-wrapper">
                        <form class="form-inline d-flex justify-content-center md-form form-sm-0" name="search" action="search-visitor.php" method="post">
                            <button class="btn btn-primary" type="submit" name="search">
                            <i class="fa fa-search" aria-hidden="false"></i></button>
                            <input class="form-control form-control-sm ml-3 w-75" type="text" name="searchdata" id="searchdata" placeholder="Search" aria-label="Search">
                        </form>
                    </div>
                    <ul class="header-menu nav">
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-link-icon fa fa-database"> </i>
                                Statistics
                            </a>
                        </li>
                    </ul>        
                </div>
                
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="assets/images/avatars/1.jpg" alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <button type="button" tabindex="0" class="dropdown-item" onclick="window.location='admin-profile.php'"><i class="fa fa-user"></i>&nbsp; Profile</button>
                                            <button type="button" tabindex="0" class="dropdown-item"><i class="fa fa-cog"></i>&nbsp; Settings</button>
                                            <div tabindex="-1" class="dropdown-divider"></div>
                                            <button type="button" tabindex="0" class="dropdown-item" onclick="window,location='logout.php'"><i class="fa fa-lock"></i>&nbsp; Logout</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        <?php
                                        $id=$_SESSION['khuvmsaid'];
                                        $ret=mysqli_query($con,"select name from admin where id='$id'");
                                        $row=mysqli_fetch_array($ret);
                                        $name=$row['name'];
                                        echo $name;
                                        ?>
                                    </div>
                                    <div class="widget-subheading">
                                        <?php
                                        $id=$_SESSION['khuvmsaid'];
                                        $ret=mysqli_query($con,"select username from admin where id='$id'");
                                        $row=mysqli_fetch_array($ret);
                                        $username=$row['username'];
                                        echo $username;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>        
                </div>
            </div>
        </div>       

    <!--
    =========================================================
    sidebar
    =========================================================
    -->
        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Dashboards</li>
                                <li>
                                    <a href="dashboard.php">
                                        <i class="metismenu-icon pe-7s-home"></i>
                                        Home
                                    </a>
                                </li>
                                <li class="app-sidebar__heading">Operations</li>
                                <li>
                                    <a href="new-visitor.php" class="mm-active">
                                        <i class="metismenu-icon pe-7s-add-user"></i>
                                        New Visitor
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-tools"></i>
                                        Manage Visitors
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="pending-checkouts.php">
                                                <i class="metismenu-icon">
                                                </i>Checkout Visitor
                                            </a>
                                        </li>
                                        <li>
                                            <a href="view-visitors.php">
                                                <i class="metismenu-icon">
                                                </i>View Visitors
                                            </a>
                                        </li>  
                                    </ul>
                                </li>
                                <li class="app-sidebar__heading">Miscelleneous</li>
                                <li>
                                    <a href="search-between-dates.php">
                                        <i class="metismenu-icon pe-7s-search"></i>
                                        Search Between Dates
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-graph3"></i>
                                        Visitor Reports
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="todays-visitors.php">
                                                <i class="metismenu-icon">
                                                </i>Today's Visitors
                                            </a>
                                        </li>
                                        <li>
                                            <a href="weekly-visitors.php">
                                                <i class="metismenu-icon">
                                                </i>Weekly Visitors
                                            </a>
                                        </li>
                                        <li>
                                            <a href="total-visitors.php">
                                                <i class="metismenu-icon">
                                                </i>Total Visitors
                                            </a>
                                        </li>   
                                    </ul>
                                </li>
                                <li class="app-sidebar__heading">Faqs</li>
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-shield">
                                        </i>Policy
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-info">
                                        </i>About
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>    
    <!--
    =========================================================
    /sidebar
    =========================================================
    -->
    


    <!--
    =========================================================
    main app
    =========================================================
    -->

    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-add-user icon-gradient bg-mean-fruit"></i>
                        </div>
                        <div>New Visitor
                            <div class="page-title-subheading">New visitor(s) registry.
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
    <!--
    =========================================================
    page content
    =========================================================
    -->
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Register New Visitor</h5>
            <!--alert in regards to register details-->
                <?php if($msg){ ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert" align="center">
                    <?php echo $msg; ?>
                </div>
                <?php }elseif ($msg1) {?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" align="center">
                    <?php echo $msg1; ?>
                </div>
                <?php } ?>
            <form class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Full name" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email address" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="mobile">Phone Number</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Phone number" required>
                        <div class="invalid-feedback">
                            Please provide a phone number.
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="address">Address</label>
                        <textarea type="text" class="form-control" id="address" name="address" placeholder="Address" required></textarea>
                        <div class="invalid-feedback">
                            Please provide a valid address.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="whomtomeet">Whom To Meet</label>
                        <input type="text" class="form-control" id="whomtomeet" name="whomtomeet" placeholder="Whom to meet" required>
                        <div class="invalid-feedback">
                            Please provide whom to meet details.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="department">Department</label>
                        <input type="text" class="form-control" id="department" name="department" placeholder="Department" required>
                        <div class="invalid-feedback">
                            Please provide a department.
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="reason">Reason To Meet</label>
                        <input type="text" class="form-control" id="reason" name="reason" placeholder="Reason to meet" required>
                        <div class="invalid-feedback">
                            Please provide a reason to meet.
                        </div>
                    </div>
                </div>
                
                <button class="btn btn-success" type="submit" id="submit" name="submit" title="Register new visitor">Register</button>
            </form>
            <script>
                // Example starter JavaScript for disabling form submissions if there are invalid fields
                (function() {
                    'use strict';
                    window.addEventListener('load', function() {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms = document.getElementsByClassName('needs-validation');
                        // Loop over them and prevent submission
                        var validation = Array.prototype.filter.call(forms, function(form) {
                            form.addEventListener('submit', function(event) {
                                if (form.checkValidity() === false) {
                                    event.preventDefault();
                                    event.stopPropagation();
                                }
                                form.classList.add('was-validated');
                            }, false);
                        });
                    }, false);
                })();
            </script>
        </div>
    </div>

    </div><!--marks the end of the main page content; leaves room for footer-->

     <!--
    =========================================================
    /page content
    =========================================================
    -->

    

    <div class="app-wrapper-footer">
        <div class="app-footer">
            <div class="app-footer__inner">
                <div class="app-footer-left">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link"><i class="fa fa-info"></i>&nbsp;
                                FAQs
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="app-footer-right">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                KHU-VMS &copy; <span id="copyright"></span>
                                <!--JS Code to auto update copyright year-->
                                <script type="text/javascript">
                                    document
                                    .getElementById("copyright")
                                    .appendChild(document.createTextNode(new Date().getFullYear()));
                                </script>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
</div>
</div>
<script type="text/javascript" src="./assets/scripts/main.js"></script></body>
</html>
<?php } ?>