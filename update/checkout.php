<?php
 session_start();
if ( $_SESSION["uid"] == "" ) {
         echo "<script>window.location = 'logincustomer'</script>";
     }else{
         $user_id = $_SESSION["uid"];
  

  require 'connection.php';

  $grand_total = 0;
  $allItems = '';
  $items = [];


  $sql = "SELECT * FROM cart WHERE user_id='$user_id' AND status = '0'";
    $run_query = mysqli_query($conn,$sql);


   
  while ($row = mysqli_fetch_array($run_query,MYSQLI_ASSOC)) {


    $grand_total += $row['total'];
    $items[] = $row['names'].' '.'('.$row['qty'].')';
 
  }
     $allItems = implode(', ', $items);


}
?>

<!DOCTYPE html>
<html lang="zxx">

<?php
include('header.php');
include('connection.php');
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
                        <a href="index.php">Home</a>
                        <i>|</i>
                    </li>
                    <li>Checkout</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- //page -->

    <!-- contact -->
    
        <div class="container  ">
            <!-- tittle heading -->
            <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
               Checkout 
            </h3>
        <strong>Your cart has: <?php echo $allItems; ?> </strong>
         <div class="privacy py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
      <!-- tittle heading --> 
      <!-- //tittle heading -->
      <div class="checkout-right">
        <!--Horizontal Tab-->
        <div id="parentHorizontalTab">
          <ul class="resp-tabs-list hor_1">
            <li>Cash on delivery (COD)</li>
            <li>Credit/Debit</li>
            <!--<li>Net Banking</li>
            <li>Paypal Account</li>-->
          </ul>
          <div class="resp-tabs-container hor_1">

            <div>
              <div class="vertical_post check_box_agile">
                <h5>COD</h5>
                <h6>You will pay the delivery person once you have received the purchased Items</h6>
                <div class="checkbox">
                  

                </div>
              </div>
            </div>
            <div>
             <!-- <form action="#" method="post" class="creditly-card-form agileinfo_form">
                <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                  <div class="credit-card-wrapper">
                    <div class="first-row form-group">
                      <div class="controls">
                        <label class="control-label">Name on Card</label>
                        <input class="billing-address-name form-control" type="text" name="name" placeholder="John Smith">
                      </div>
                      <div class="w3_agileits_card_number_grids my-3">
                        <div class="w3_agileits_card_number_grid_left">
                          <div class="controls">
                            <label class="control-label">Card Number</label>
                            <input class="number credit-card-number form-control" type="text" name="number" inputmode="numeric" autocomplete="cc-number"
                                autocompletetype="cc-number" x-autocompletetype="cc-number" placeholder="&#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149;">
                          </div>
                        </div>
                        <div class="w3_agileits_card_number_grid_right mt-2">
                          <div class="controls">
                            <label class="control-label">CVV</label>
                            <input class="security-code form-control" Â· inputmode="numeric" type="text" name="security-code" placeholder="&#149;&#149;&#149;">
                          </div>
                        </div>
                        <div class="clear"> </div>
                      </div>
                      <div class="controls">
                        <label class="control-label">Expiration Date</label>
                        <input class="expiration-month-and-year form-control" type="text" name="expiration-month-and-year" placeholder="MM / YY">
                      </div>
                    </div>
                    <button class="submit mt-3">
                      <span>Make a payment </span>
                    </button>
                  </div>
                </div>
              </form>-->
              <p style="color: blue">This payment method is coming soon</p>
            </div>
            <div>
              <div class="vertical_post">
                <form action="#" method="post">
                  <h5>Select From Popular Banks</h5>
                  <div class="swit-radio">
                    <div class="check_box_one">
                      <div class="radio_one">
                        <label>
                          <input type="radio" name="radio" checked="">
                          <i></i>Syndicate Bank</label>
                      </div>
                    </div>
                    <div class="check_box_one">
                      <div class="radio_one">
                        <label>
                          <input type="radio" name="radio">
                          <i></i>Bank of Baroda</label>
                      </div>
                    </div>
                    <div class="check_box_one">
                      <div class="radio_one">
                        <label>
                          <input type="radio" name="radio">
                          <i></i>Canara Bank</label>
                      </div>
                    </div>
                    <div class="check_box_one">
                      <div class="radio_one">
                        <label>
                          <input type="radio" name="radio">
                          <i></i>ICICI Bank</label>
                      </div>
                    </div>
                    <div class="check_box_one">
                      <div class="radio_one">
                        <label>
                          <input type="radio" name="radio">
                          <i></i>State Bank Of India</label>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <h5>Or Select Other Bank</h5>
                  <div class="section_room_pay">
                    <select class="year">
                      <option value="">=== Other Banks ===</option>
                      <option value="ALB-NA">Allahabad Bank NetBanking</option>
                      <option value="ADB-NA">Andhra Bank</option>
                      <option value="BBK-NA">Bank of Bahrain and Kuwait NetBanking</option>
                      <option value="BBC-NA">Bank of Baroda Corporate NetBanking</option>
                      <option value="BBR-NA">Bank of Baroda Retail NetBanking</option>
                      <option value="BOI-NA">Bank of India NetBanking</option>
                      <option value="BOM-NA">Bank of Maharashtra NetBanking</option>
                      <option value="CSB-NA">Catholic Syrian Bank NetBanking</option>
                      <option value="CBI-NA">Central Bank of India</option>
                      <option value="CUB-NA">City Union Bank NetBanking</option>
                      <option value="CRP-NA">Corporation Bank</option>
                      <option value="DBK-NA">Deutsche Bank NetBanking</option>
                      <option value="DCB-NA">Development Credit Bank</option>
                      <option value="DC2-NA">Development Credit Bank - Corporate</option>
                      <option value="DLB-NA">Dhanlaxmi Bank NetBanking</option>
                      <option value="FBK-NA">Federal Bank NetBanking</option>
                      <option value="IDS-NA">Indusind Bank NetBanking</option>
                      <option value="IOB-NA">Indian Overseas Bank</option>
                      <option value="ING-NA">ING Vysya Bank (now Kotak)</option>
                      <option value="JKB-NA">Jammu and Kashmir NetBanking</option>
                      <option value="JSB-NA">Janata Sahakari Bank Limited</option>
                      <option value="KBL-NA">Karnataka Bank NetBanking</option>
                      <option value="KVB-NA">Karur Vysya Bank NetBanking</option>
                      <option value="LVR-NA">Lakshmi Vilas Bank NetBanking</option>
                      <option value="OBC-NA">Oriental Bank of Commerce NetBanking</option>
                      <option value="CPN-NA">PNB Corporate NetBanking</option>
                      <option value="PNB-NA">PNB NetBanking</option>
                      <option value="RSD-DIRECT">Rajasthan State Co-operative Bank-Debit Card</option>
                      <option value="RBS-NA">RBS (The Royal Bank of Scotland)</option>
                      <option value="SWB-NA">Saraswat Bank NetBanking</option>
                      <option value="SBJ-NA">SB Bikaner and Jaipur NetBanking</option>
                      <option value="SBH-NA">SB Hyderabad NetBanking</option>
                      <option value="SBM-NA">SB Mysore NetBanking</option>
                      <option value="SBT-NA">SB Travancore NetBanking</option>
                      <option value="SVC-NA">Shamrao Vitthal Co-operative Bank</option>
                      <option value="SIB-NA">South Indian Bank NetBanking</option>
                      <option value="SBP-NA">State Bank of Patiala NetBanking</option>
                      <option value="SYD-NA">Syndicate Bank NetBanking</option>
                      <option value="TNC-NA">Tamil Nadu State Co-operative Bank NetBanking</option>
                      <option value="UCO-NA">UCO Bank NetBanking</option>
                      <option value="UBI-NA">Union Bank NetBanking</option>
                      <option value="UNI-NA">United Bank of India NetBanking</option>
                      <option value="VJB-NA">Vijaya Bank NetBanking</option>
                    </select>
                  </div>
                  <input type="submit" value="PAY NOW">
                </form>
              </div>
            </div>
            <div>
              <div id="tab4" class="tab-grid" style="display: block;">
                <div class="row">
                  <div class="col-md-6 pay-forms">
                    <img class="pp-img" src="images/paypal.png" alt="Image Alternative text" title="Image Title">
                    <p>Important: You will be redirected to PayPal's website to securely complete your payment.</p>
                    <a class="btn btn-primary">Checkout via Paypal</a>
                  </div>
                  <div class="col-md-6 number-paymk">
                    <form action="#" method="post" class="creditly-card-form-2 shopf-sear-headinfo_form">
                      <section class="creditly-wrapper payf_wrapper">
                        <div class="credit-card-wrapper">
                          <div class="first-row form-group">
                            <div class="controls">
                              <label class="control-label">Card Holder </label>
                              <input class="billing-address-name form-control" type="text" name="name" placeholder="John Smith">
                            </div>
                            <div class="paymntf_card_number_grids my-2">
                              <div class="fpay_card_number_grid_left">
                                <div class="controls">
                                  <label class="control-label">Card Number</label>
                                  <input class="number credit-card-number-2 form-control" type="text" name="number" inputmode="numeric" autocomplete="cc-number"
                                      autocompletetype="cc-number" x-autocompletetype="cc-number" placeholder="•••• •••• •••• ••••">
                                </div>
                              </div>
                              <div class="fpay_card_number_grid_right mt-2">
                                <div class="controls">
                                  <label class="control-label">CVV</label>
                                  <input class="security-code-2 form-control" Â·="" inputmode="numeric" type="text" name="security-code" placeholder="•••">
                                </div>
                              </div>
                              <div class="clear"> </div>
                            </div>
                            <div class="controls">
                              <label class="control-label">Valid Thru</label>
                              <input class="expiration-month-and-year-2 form-control" type="text" name="expiration-month-and-year" placeholder="MM / YY">
                            </div>
                          </div>
                          <input class="submit" type="submit" value="Proceed Payment">
                        </div>
                      </section>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--Plug-in Initialisation-->
      </div>
    </div>
  </div>
         <div class="checkout-left">
        <div class="address_form_agile mt-sm-5 mt-4">
          <h4 class="mb-sm-4 mb-3">Delivery Information</h4>
          <form action="#" method="post" class="creditly-card-form agileinfo_form">
            <div class="creditly-wrapper wthree, w3_agileits_wrapper">
              <div class="information-wrapper">
                <div class="first-row">
                  <div class="controls form-group">
                    <input class="billing-address-name form-control" type="text" name="name" value="<?php
                       $sql = "SELECT * FROM user_info WHERE user_id='$user_id'";
                          $run_query = mysqli_query($conn,$sql);
                            $row= mysqli_fetch_array($run_query);
                            echo $row['first_name'];
                    ?>" required="" disabled>
                  </div>
                  <div class="w3_agileits_card_number_grids">
                    <div class="w3_agileits_card_number_grid_left form-group">
                      <div class="controls">
                        <input type="text" class="form-control" value="<?php
                       $sql = "SELECT * FROM user_info WHERE user_id='$user_id'";
                          $run_query = mysqli_query($conn,$sql);
                            $row= mysqli_fetch_array($run_query);
                            echo $row['mobile'];
                    ?>" name="number" required="" disabled>
                      </div>
                    </div> 
                  </div>
                  <div class="controls form-group">
                    <input type="text" class="form-control" value="<?php
                       $sql = "SELECT * FROM user_info WHERE user_id='$user_id'";
                          $run_query = mysqli_query($conn,$sql);
                            $row= mysqli_fetch_array($run_query);
                            echo $row['address1'];
                    ?>"  name="city" required="" disabled>
                  </div> 
                </div>
               
              </div>
            </div>
          </form> 
           <a href="check"><button class="btn btn-success" style="background: #0879c9">Checkout</button></a>
        </div>
      </div>
      </div>
    </div>
  </div>

    <?php
    include('footer.php');
    ?>


  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
  <link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css " />
  <script src="js/easyResponsiveTabs.js"></script>
  <script>
    $(document).ready(function () {
      //Horizontal Tab
      $('#parentHorizontalTab').easyResponsiveTabs({
        type: 'default', //Types: default, vertical, accordion
        width: 'auto', //auto or any width like 600px
        fit: true, // 100% fit in a container
        tabidentify: 'hor_1', // The tab groups identifier
        activate: function (event) { // Callback function if tab is switched
          var $tab = $(this);
          var $info = $('#nested-tabInfo');
          var $name = $('span', $info);
          $name.text($tab.text());
          $info.show();
        }
      });
    });
  </script>
  <!-- //easy-responsive-tabs -->

  <!-- credit-card -->
  <script src="js/creditly.js"></script>
  <link rel="stylesheet" href="css/creditly.css" type="text/css" media="all" />
  <script>
    $(function () {
      var creditly = Creditly.initialize(
        '.creditly-wrapper .expiration-month-and-year',
        '.creditly-wrapper .credit-card-number',
        '.creditly-wrapper .security-code',
        '.creditly-wrapper .card-type');


      $(".creditly-card-form .submit").click(function (e) {
        e.preventDefault();
        var output = creditly.validate();
        if (output) {
          // Your validated credit card output
          console.log(output);
        }
      });
    });
  </script>

  <!-- creditly2 (for paypal) -->
  <script src="js/creditly2.js"></script>
  <script>
    $(function () {
      var creditly = Creditly2.initialize(
        '.creditly-wrapper .expiration-month-and-year-2',
        '.creditly-wrapper .credit-card-number-2',
        '.creditly-wrapper .security-code-2',
        '.creditly-wrapper .card-type');

      $(".creditly-card-form-2 .submit").click(function (e) {
        e.preventDefault();
        var output = creditly.validate();
        if (output) {
          // Your validated credit card output
          console.log(output);
        }
      });
    });
  </script>
  <script type="text/javascript">
  $(document).ready(function() {

    // Send product details in the server
    $(".addItemBtn").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var pid = $form.find(".pid").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var pimage = $form.find(".pimage").val();
      var pshop = $form.find(".pshop").val();
      var ptype = $form.find(".ptype").val();
      var porgin = $form.find(".porgin").val();
      var user_id = $form.find(".user_id").val();

      var pqty = $form.find(".pqty").val();
      var user

      $.ajax({
        url: 'action.php',
        method: 'post',
        data: {
          pid: pid,
          pname: pname,
          pprice: pprice,
          pimage: pimage,
          pshop: pshop,
          ptype: ptype,
          porgin: porgin,
          user_id: user_id
        },
        success: function(response) {
          $("#message").html(response);
          window.scrollTo(0, 0);
          load_cart_item_number();
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
</script>   

  <!-- //credit-card -->
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