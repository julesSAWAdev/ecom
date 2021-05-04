<?php
    include "connection.php";
    $msg = "";

    // login 
if(isset($_POST["submit"])){
    $username = mysqli_real_escape_string ($conn, $_POST["username"]);
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username='$username' AND password = '$password'";
    $run_query = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($run_query);
    if ($count == 1) {
        $row= mysqli_fetch_array($run_query);
        session_start ();
        $_SESSION["uid"] = $row["user_id"]; 
        $_SESSION["name"] = $row["names"];
        $user_id =  $_SESSION["uid"];
        $query = "SELECT MIN(role_id) FROM user_roles WHERE user_id='$user_id'";
        $result = mysqli_query($conn,$query);
        $roww= mysqli_fetch_array($result);
        $role_id = $roww[0];
        $query1 = "SELECT * FROM roles WHERE role_id='$role_id'";
        $result1 = mysqli_query($conn,$query1);
        $roww= mysqli_fetch_array($result1);
        $role = $roww['role_name'];
        $_SESSION["role"] = $role;
        
        echo "<script>window.location = 'dashboard'</script>";
    }else{
        $msg = "
    <div class='alert alert-warning'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <b>Invalid Email or password</b>
    </div>
    ";
    }
}

?>
<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.9.3/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 22 Oct 2020 13:21:28 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>La Corniche MIS | Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

               <!-- <h6 class="logo-name">La m</h6> -->

            </div>
            
            <h3 style="margin-top: 200px">Welcome</h3>
            <p>La corniche MIS
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
                <div class='message-info'>
                    <?php if ($msg != "") echo $msg . "<br>" ?>
                </div>
             <form class="m-t" role="form" method="POST" action="index.php">
                <div class="form-group">
                    <input type="username" name="username" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" name="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a href="#"><small>Forgot password?</small></a>
               <!-- <p class="text-muted text-center"><small>Do not have an account?</small></p> 
                <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a> -->
            </form>
            <p class="m-t"> <small>Copyright Reserved &copy; 2020</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>

</body>


 </html>
