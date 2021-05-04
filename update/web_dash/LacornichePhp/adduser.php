<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
 
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>La corniche | Add Users</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <?php 
            include("navigation.php");
        ?>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
             
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome <?php echo $_SESSION["name"];?></span>
                </li> 


                <li>
                    <a href="logout.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Users</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>User management</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Add user</strong>
                        </li>
                    </ol>
                </div> 
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
             
                <div class="col-lg-7">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Fill this form to add a user</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                 
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form>
                                <div class="form-group row"><label class="col-lg-2 col-form-label">Full Name</label>

                                    <div class="col-lg-10"><input type="text" placeholder="Full names" required class="form-control"> <span class="form-text m-b-none">First name and Last name</span>
                                    </div>
                                </div>
                                <div class="form-group row"><label class="col-lg-2 col-form-label">Username</label>

                                    <div class="col-lg-10"><input type="text" placeholder="username" required class="form-control"> <span class="form-text m-b-none">Username can be anything i.e name initials</span>
                                    </div>
                                </div>
                                <div class="form-group row"><label class="col-lg-2 col-form-label">Email</label>

                                    <div class="col-lg-10"><input type="email" required placeholder="Email" class="form-control"> <span class="form-text m-b-none">User email adrress</span>
                                    </div>
                                </div>
                                <div class="form-group row"><label class="col-lg-2 col-form-label">ID number</label>

                                    <div class="col-lg-10"><input type="text" required placeholder="id/passport number" class="form-control"> <span class="form-text m-b-none">ID number/ Passport number</span>
                                    </div>
                                </div>
                                <div class="form-group row"><label class="col-lg-2 col-form-label">Phone</label>

                                    <div class="col-lg-10"><input type="text" required placeholder="Phone number" class="form-control"> <span class="form-text m-b-none">Phone Number</span>
                                    </div>
                                </div>
                                <div class="form-group row"><label class="col-lg-2 col-form-label">Address</label>

                                    <div class="col-lg-10"><input type="text" placeholder="Address" class="form-control"><span class="form-text m-b-none">Address i.e residence</span></div>
                                </div> 
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <button class="btn btn-primary btn-lg" type="submit" name="submit" style="float: right;">Add user</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
             
        </div>
        <?php
            include("footer.php");
        ?>

        </div>
        </div>


    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>
</body>


 </html>
