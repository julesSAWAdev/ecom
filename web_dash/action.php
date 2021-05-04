<?php
include('connection.php');
$grandTotal =0;

if (isset($_POST['submit'])) {
         $orderid =  $_POST["orderid"];
         $quantity = $_POST['quantity']; 
         $batch_id = $_POST['batchid'];

    if (empty($orderid) || empty($quantity)) {
        $msg = "
                    <div class='alert alert-warning'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <b>Invalid request / bad request</b>
                    </div>";
    }else{
         $sql = "UPDATE orders SET quantity='$quantity' WHERE order_id = '$orderid' ";
        $run_query = mysqli_query($conn,$sql);

        if ($run_query) {

             $total = "SELECT * FROM orders WHERE batch_id='$batch_id' and order_id ='$orderid'";
                    $exec = mysqli_query($conn,$total);
                    while ($roww = mysqli_fetch_array($exec)) {
                        $menu_id = $roww['menu_id'];
                         $quantityy = $roww['quantity'];
                        $getprice = "SELECT * FROM menu where menu_id='$menu_id'";
                        $execgetprice = mysqli_query($conn,$getprice);
                        $rowww = mysqli_fetch_array($execgetprice);
                              $priceItemm = $rowww['price'];
                             
                            


           //echo "<script>window.location = 'myorders'</script>";

        }

       echo $itemprice = $priceItemm * ($quantity-1);
       $query = "SELECT * FROM order_payment WHERE batch_id = $batch_id";
       $runit = mysqli_query($conn,$query);
       while($data = mysqli_fetch_array($runit)){
       echo $initial = $data['total'];

        $new = $initial + $itemprice;
        $updateprice = "UPDATE order_payment SET total ='$new' where batch_id = '$batch_id'";
        $queryrun = mysqli_query($conn,$updateprice);

        if ($queryrun) {
           echo "<script>window.location = 'myorders'</script>";
        }
       }
       
          
}
}
}