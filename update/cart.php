<?php
  session_start();
  if ( $_SESSION["uid"] == "" ) {
         $user_id = $_SESSION["rand"]; 
     }else{
        $user_id = $_SESSION["uid"];
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
                        <a href="index">Home</a>
                        <i>|</i>
                    </li>
                    <li>Cart</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- //page -->

    <!-- contact -->
    
        <div class="container  ">
            <!-- tittle heading -->
            <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
               Your cart
            </h3>
        <div class="table-responsive mt-2">
          <table class="table table-bordered table-striped text-center">
            <thead>
              
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Product</th>
                <th>Price (Rwf)</th>
                <th>Quantity</th>
                <th>Total Price(Rwf)</th>
                <th>
                  <a href="action?clear=<?php echo $user_id?>" class="badge-danger badge p-1" onclick="return confirm('Are you sure want to clear your cart?');"><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
                require 'connection.php';
                if ( $_SESSION["uid"] == "" ) {
                   $uid = $_SESSION["rand"];
                  $sql = "SELECT * FROM cart WHERE user_id = '$uid'  AND status ='0'";
                }else{
                   $uid = $_SESSION["uid"];
                   $sql = "SELECT * FROM cart WHERE user_id = '$uid'  AND status ='0'";
                }
                  $result = mysqli_query($conn,$sql);
                   $grand_total = 0;
                while ($row = $result->fetch_assoc()):
              ?>
              <tr>
                <td><?= $row['id'] ?></td>
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <td><img src="<?= $row['image'] ?>" width="50"></td>
                <td><?= $row['names'] ?></td>
                <td>
                  <i class=" "></i>&nbsp;&nbsp;<?= number_format($row['price'],0); ?>
                </td>
                <input type="hidden" class="pprice" value="<?= $row['price'] ?>">
                <td>
                  <input type="number" class="form-control itemQty" value="<?= $row['qty'] ?>" style="width:75px;">
                </td>
                <td><i class=" "></i>&nbsp;&nbsp;<?= number_format($row['total'],0); ?></td>
                <td>
                  <a href="action?remove=<?= $row['id'] ?>" class="text-danger lead" onclick="return confirm('Are you sure want to remove this item?');"><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
              <?php $grand_total += $row['total']; ?>
              <?php endwhile; ?>
              <tr>
                <td colspan="3">
                  <a href="index" class="btn btn-success"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue
                    Shopping</a>
                </td>
                <td colspan="2"><b>Grand Total</b></td>
                <td><b><i class=" "></i>&nbsp;&nbsp;<?= number_format($grand_total,0); echo "Rwf"; ?></b></td>
                <td>
                  <a href="checkout" class="btn btn-info <?= ($grand_total > 1) ? '' : 'disabled'; ?>"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

    <?php
    include('footer');
    ?>


  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Change the item quantity
    $(".itemQty").on('change', function() {
      var $el = $(this).closest('tr');

      var pid = $el.find(".pid").val();
      var pprice = $el.find(".pprice").val();
      var qty = $el.find(".itemQty").val();
      location.reload(true);
      $.ajax({
        url: 'action.php',
        method: 'post',
        cache: false,
        data: {
          qty: qty,
          pid: pid,
          pprice: pprice
        },
        success: function(response) {
          console.log(response);
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