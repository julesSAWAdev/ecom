<?php
 session_start();
if ( $_SESSION["uid"] == "" ) {
         echo "<script>window.location = 'logincustomer'</script>";
     }else{
         $user_id = $_SESSION["uid"];
  

  require 'connection.php';

  $sql = "SELECT * FROM cart WHERE user_id='$user_id' AND status = '0'";
    $run_query = mysqli_query($conn,$sql);


   
  while ($row = mysqli_fetch_array($run_query,MYSQLI_ASSOC)) {
  	$type = $row['types'];
    $p_id = $row['p_id'];
    $shop_id = $row['shop_id'];
    $user_id = $row['user_id'];
    $qty = $row['qty'];
    $total = $row['total'];
    $ori = $row['origin'];

    if ($type == 'electronics') {
        $row['names'].' belongs to '.$row['types']."<br>";
      $query = "INSERT INTO electronics_request_tbl(spare_id,shop_id,user_id,qty,totale,origin) VALUES('$p_id','$shop_id','$user_id','$qty','$total','$ori')";
      $run = mysqli_query($conn,$query);
    }
     if ($type == 'spares') {
        $row['names'].' belongs to '.$row['types']."<br>";

      $query = "INSERT INTO spare_request_tbl(spare_id,shop_id,user_id,qty,totale,origin) VALUES('$p_id','$shop_id','$user_id','$qty','$total','$ori')";
      $run = mysqli_query($conn,$query);
    }if ($type == 'other') {
        $row['names'].' belongs to '.$row['types']."<br>";

      $query = "INSERT INTO other_request_tbl(spare_id,shop_id,user_id,qty,totale,origin) VALUES('$p_id','$shop_id','$user_id','$qty','$total','$ori')";
      $run = mysqli_query($conn,$query);
    }
  }

  if ( $run_query) {
  	 $sql1 = "UPDATE cart SET status ='1' WHERE user_id='$user_id'";
    $run_query1 = mysqli_query($conn,$sql1);
    if ($run_query1) {
    	 echo "<script>window.location = 'thanks'</script>";
    }
  }
}