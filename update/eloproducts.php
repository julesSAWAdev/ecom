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
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.php">Home</a>
						<i>|</i>
					</li>
					<li>Electronics</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->

	<!-- top Products -->
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-12">
					<div class="wrapper">
						<!-- first section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<div class="row">
                            <?php
							$query =  "SELECT * FROM web_products WHERE types='electronics'";
							$result = mysqli_query($conn,$query);
							while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
								$name = $row['sparename'];
								$price = $row['spareprice'];
								?>
								<div class="col-md-3 product-men">
                                <div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<img src=<?php echo $row['image'] ?> alt="" style="height:200px">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="single?id=<?php echo $row['spareid']?>" class="link-product-add-cart">Quick View</a>
												</div>
											</div>
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<a href="single?id=<?php echo $row['spareid']?>"><?php echo $row['sparename'] ?></a>
											</h4>
											<div class="info-product-price my-2">
												<span class="item_price"><?php echo $row['spareprice'].' Rwf' ?></span>
												 
											</div>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												<form action=""  class="form-submit">
													<fieldset>
													<input type="hidden"  class="pid" value="<?= $row['spareid'] ?>">
														<input type="hidden"  class="pname" value="<?= $row['sparename'] ?>">
														<input type="hidden"  class="pprice" value="<?= $row['spareprice'] ?>">
														<input type="hidden"  class="pimage" value="<?= $row['image'] ?>">
														<input type="hidden"  class="pshop" value="<?= $row['shopid'] ?>">  
														<input type="hidden" class="ptype" value="<?= $row['types'] ?>">
														<input type="hidden" class="porgin" value="<?= $row['origin'] ?>">
														<input type="hidden" class="user_id" value="<?= $user_id ?>">
														<input type="submit" name="submit" value="Add to cart" class="button btn addItemBtn" />
													</fieldset>
												</form>
											</div>
										</div>
									</div>
                                </div> 
                            <?php } ?>

							</div>
						</div>  
						<!-- //fourth section -->
					</div>
				</div> 
			</div>
		</div>
	</div>
	<!-- //top products -->

	<!-- middle section -
	<div class="join-w3l1 py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<div class="row">
				<div class="col-lg-6">
					<div class="join-agile text-left p-4">
						<div class="row">
							<div class="col-sm-7 offer-name">
								<h6>Smooth, Rich & Loud Audio</h6>
								<h4 class="mt-2 mb-3">Branded Headphones</h4>
								<p>Sale up to 25% off all in store</p>
							</div>
							<div class="col-sm-5 offerimg-w3l">
								<img src="images/off1.png" alt="" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 mt-lg-0 mt-5">
					<div class="join-agile text-left p-4">
						<div class="row ">
							<div class="col-sm-7 offer-name">
								<h6>A Bigger Phone</h6>
								<h4 class="mt-2 mb-3">Smart Phones 5</h4>
								<p>Free shipping order over $100</p>
							</div>
							<div class="col-sm-5 offerimg-w3l">
								<img src="images/off2.png" alt="" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	middle section -->

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