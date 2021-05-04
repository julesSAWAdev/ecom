<?php
include "connection.php";
session_start();
if ($_SESSION["name"] != "") {
    $msg = "";
}else{
   $msg = "
    <div class='alert alert-danger'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>To become a seller you must register yourself as a user click <a href='registercustomer.php'>here</a> to sign up</b>
    </div>
    "; 
}

if (isset($_POST['submit'])) {
    

$l_name = $_POST["names"];
$email = $_POST['email'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$mobile = $_POST['phone'];
$address1 = $_POST['address']; 
$name = "/^[a-zA-Z ]+$/";
$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
$number = "/^[0-9]+$/";
//echo $f_name;

if (empty($l_name) ||  empty($email) || empty($password) || empty($repassword) || empty($mobile) || empty($address1)) {
    $msg = "
    <div class='alert alert-warning'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
    </div>
    ";
   
} else {
// validate frist name
if (!preg_match($name,$l_name)) {
    $msg = "
    <div class='alert alert-warning'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b>this $f_name is not valid..!</b>
    </div>
    ";
   
}
// email validation
if (!preg_match($emailValidation,$email)) {
    $msg = "
    <div class='alert alert-warning'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <b>this $email is not valid..!</b>
    </div>
    ";
   
}
// password
if(strlen($password) < 9 ){
     $msg = "
    <div class='alert alert-warning'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <b>Password is weak</b>
    </div>
    ";
   
}
if(strlen($repassword) < 9 ){
     $msg = "
    <div class='alert alert-warning'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <b>Password is weak must have 9 characters</b>
    </div>
    ";
   
}
// check password and repassword are match
if ($password != $repassword) {
     $msg = "
    <div class='alert alert-warning'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <b>password is not same</b>
    </div
    ";
}
//mobile number validation
if (!preg_match($number,$mobile)) {
     $msg = "
    <div class='alert alert-warning'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <b>Mobile number $mobile is not valid</b>
    </div>
    ";
   
}
if(!(strlen($mobile) == 10)){
     $msg = "
    <div class='alert alert-warning'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <b>Mobile number must be 10 digit</b>
    </div>
    ";
   
}
// check existing email
$sql = "SELECT user_id FROM user_info WHERE email ='$email' LIMIT 1";
$check_query = mysqli_query($conn ,$sql );
$count_email = mysqli_num_rows($check_query);
if ($count_email > 0 ) {
     $msg = "
    <div class='alert alert-danger'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <b>email is already registerd try with another email or use forget password</b>
    </div>
    ";
   
} else { 
    $sql = "INSERT INTO user_info (first_name, email, 
        password, mobile, address1) 
        VALUES ('$l_name', '$email', 
        '$password', '$mobile', '$address1')";
    $run_query = mysqli_query($conn,$sql);
    if ($run_query) {
         $msg = "
        <div class='alert alert-success'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b>Registered Successfully .. Login</b>
        </div>
        ";
    }
}
}
}

?>
<!DOCTYPE html>
<html lang="zxx">

<?php
include('header.php');
?>

<body>
     
 <?php
 include('top.php');
 include('navigation.php');
 ?>

    <!-- banner-2 -->
    <div class="page-head_agile_info_w3l">

    </div>
    <!-- //banner-2 -->
    <!-- page -->
    <div class="services-breadcrumb">
        <div class="agile_inner_breadcrumb">
            <div class="container">
                <ul class="w3_short">
                    <li>
                        <a href="index.html">Home</a>
                        <i>|</i>
                    </li>
                    <li>Customer Registration</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- //page -->

    <!-- contact -->
    <div class="contact py-sm-5 py-4">
        <div class="container py-xl-4 py-lg-2">
            <!-- tittle heading -->
            <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                Registration
            </h3>
            <!-- //tittle heading -->
            <div class="row contact-grids agile-1 mb-5">
                <div class="col-sm-4  text-center contact-grid agileinfo-6 mt-sm-0 mt-2">
                    <div class="contact-grid1 text-center">
                         
                        
                    </div>
                </div>
                <div class="col-sm-4  contact-grid agileinfo-6 mt-sm-0 mt-2">
                    <div class="contact-grid1 ">
                         
                        <div class='message'>
                        <?php if ($msg != "") echo $msg . "<br>" ;?>

                    </div>
                    <?php if ($_SESSION['name'] !="") {

                    $id = $_SESSION["uid"];
                    $sql = "SELECT * FROM user_info WHERE user_id ='$id'";
                    $run_query = mysqli_query($conn,$sql);
                    $row= mysqli_fetch_array($run_query);

                    echo "<form action='registerseller.php' method='POST'>";
                       echo " <div class='form-group'>";
                           echo " <label class='col-form-label'>Shop Name</label>";
                           echo " <input type='text' class='form-control' placeholder=' ' name='shopname' required=''>";
                        echo "</div>";
                       echo " <div class='form-group'>";
                            echo "<label class='col-form-label'>Shop tin</label>";
                            echo "<input type='text' class='form-control' placeholder=' ' name='shoptin'>";
                       echo " </div>";
                       echo " <div class='form-group'>";
                           echo " <label class='col-form-label'>Shop Owner</label>";
                           echo " <input type='text' class='form-control' value='".$row['first_name']." ' name='shopowner' readonly id='password1' required=''>";
                       echo " </div>"; 
                           echo " <input type='text' class='form-control' value='".$row['user_id']." ' name='shopuserid' readonly hidden id='password1' required=''>";
                        
                       echo " <div class='form-group'>";
                            echo "<label class='col-form-label'>Commercial Address</label>";
                           echo " <input type='text' class='form-control' placeholder=' ' name='shopaddress' id='password2' required=''>";
                       echo " </div>";

                       echo " <div class='form-group'>";
                            echo "<label class='col-form-label'>Shop Phone</label>";
                           echo " <input type='text' class='form-control' placeholder=' ' name='shopphone' id='password2' required=''>";
                       echo " </div>";
                       echo " <div class='form-group'>";
                           echo " <label class='col-form-label'>Shop Type</label>";
                            echo "<select class='form-control' placeholder=' ' name='shoptype'>";
                               echo " <option>Car rental</option>";
                               echo " <option>Electronics</option>";
                               echo " <option>Spare parts</option>";
                               echo " <option>Other</option>"; 
                           echo " </select>";
                       echo " </div>";
                       echo " <div class='right-w3l'>";
                           echo " <input type='submit' class='form-control' name='submit' value='Register'>";
                       echo " </div>";
                       echo " <div class='sub-w3l'>";
                           echo " <div class='custom-control custom-checkbox mr-sm-2'>";
                               echo " <input type='checkbox' class='custom-control-input' id='customControlAutosizing2'>";
                               echo " <label class='custom-control-label' for='customControlAutosizing2'>I Accept to the Terms & Conditions</label>";
                           echo " </div>";
                       echo " </div>";
                  echo "  </form>";
                    } ?>
                   
                    </div>
                </div>
              
            </div>
             
        </div>
    </div>
    <!-- //contact -->

     
    <!-- //map -->
 
    <!-- middle section -->

    <!-- footer -->
    <?php
    include('footer.php');
    ?>
    <!-- //copyright -->

    <!-- js-files -->
    <!-- jquery -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <!-- //jquery -->

    <!-- nav smooth scroll -->
    <script>
        $(document).ready(function () {
            $(".dropdown").hover(
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
    <!-- //nav smooth scroll -->

    <!-- popup modal (for location)-->
    <script src="js/jquery.magnific-popup.js"></script>
    <script>
        $(document).ready(function () {
            $('.popup-with-zoom-anim').magnificPopup({
                type: 'inline',
                fixedContentPos: false,
                fixedBgPos: true,
                overflowY: 'auto',
                closeBtnInside: true,
                preloader: false,
                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-zoom-in'
            });

        });
    </script>
    <!-- //popup modal (for location)-->

    <!-- cart-js -->
    <script src="js/minicart.js"></script>
    <script>
        paypals.minicarts.render(); //use only unique class names other than paypals.minicarts.Also Replace same class name in css and minicart.min.js

        paypals.minicarts.cart.on('checkout', function (evt) {
            var items = this.items(),
                len = items.length,
                total = 0,
                i;

            // Count the number of each item in the cart
            for (i = 0; i < len; i++) {
                total += items[i].get('quantity');
            }

            if (total < 3) {
                alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
                evt.preventDefault();
            }
        });
    </script>
    <!-- //cart-js -->

    <!-- password-script -->
    <script>
        window.onload = function () {
            document.getElementById("password1").onchange = validatePassword;
            document.getElementById("password2").onchange = validatePassword;
        }

        function validatePassword() {
            var pass2 = document.getElementById("password2").value;
            var pass1 = document.getElementById("password1").value;
            if (pass1 != pass2)
                document.getElementById("password2").setCustomValidity("Passwords Don't Match");
            else
                document.getElementById("password2").setCustomValidity('');
            //empty string means no validation error
        }
    </script>
    <!-- //password-script -->

    <!-- smoothscroll -->
    <script src="js/SmoothScroll.min.js"></script>
    <!-- //smoothscroll -->

    <!-- start-smooth-scrolling -->
    <script src="js/move-top.js"></script>
    <script src="js/easing.js"></script>
    <script>
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();

                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- //end-smooth-scrolling -->

    <!-- smooth-scrolling-of-move-up -->
    <script>
        $(document).ready(function () {
            /*
            var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
            };
            */
            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <!-- //smooth-scrolling-of-move-up -->

    <!-- for bootstrap working -->
    <script src="js/bootstrap.js"></script>
    <!-- //for bootstrap working -->
    <!-- //js-files -->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5fce55bc920fc91564ce4d5b/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>

</html>