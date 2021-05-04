<?php
session_start();
include("connection.php");
$msg = "";
if (isset($_POST['submit'])) {
     $waiter_id =  $_SESSION["uid"];
     $table = $_POST['table'];
    $orders = $_POST['orders'];
    if (empty($waiter_id) || empty($table) || empty($orders)) {
        $msg = "
                    <div class='alert alert-warning'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <b>Invalid request / bad request</b>
                    </div>";
    }else{
         $sql = "SELECT * FROM orders ORDER BY order_id DESC LIMIT 1 ";
        $run_query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($run_query);
        if($row['batch_id'] ==''){
           $batch_id = 1;}else{
             $batch_id = $row['batch_id'] + 1;
           }

            foreach ($orders as $a){ 
                 $query = "INSERT INTO orders(waiter_id,menu_id,batch_id,status) VALUES('$waiter_id','$a',$batch_id,'Ordered') ";
                $run = mysqli_query($conn,$query);

                
                   
               // echo $grandTotal ; 
        }
        
       
}
 $total = "SELECT * FROM orders WHERE batch_id='$batch_id'";
                    $exec = mysqli_query($conn,$total);
                    while ($roww = mysqli_fetch_array($exec)) {
                        $menu_id = $roww['menu_id'];
                        $getprice = "SELECT * FROM menu where menu_id='$menu_id'";
                        $execgetprice = mysqli_query($conn,$getprice);
                        $rowww = mysqli_fetch_array($execgetprice);
                              $priceItem = $rowww['price'];
                              $grandTotal += $priceItem;
                        
                       
                
                   // echo $grandTotal ; 
                    //$msg = "
                    //<div class='alert alert-success'>
                    //<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    //<b>New order successfully placed</b>
                    //</div>";
                }
   $grandTotal;
   $batch_id;
 $payment = "INSERT INTO order_payment(batch_id,total,status,user_id) VALUES('$batch_id','$grandTotal','Unpaid','$waiter_id')";
 $execpayment = mysqli_query($conn,$payment);
 if ($execpayment){
    $msg = "
                    <div class='alert alert-success'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <b>New order successfully placed</b>
                    </div>";
}
}

?>
<!DOCTYPE html>
<html>


 

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>La corniche | MIS</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">

    <link href="css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <link href="css/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">

    <link href="css/plugins/cropper/cropper.min.css" rel="stylesheet">

    <link href="css/plugins/switchery/switchery.css" rel="stylesheet">

    <link href="css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">

    <link href="css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">

    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <link href="css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">

    <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

    <link href="css/plugins/clockpicker/clockpicker.css" rel="stylesheet">

    <link href="css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">

    <link href="css/plugins/select2/select2.min.css" rel="stylesheet">
    <link href="css/plugins/select2/select2-bootstrap4.min.css" rel="stylesheet">

    <link href="css/plugins/touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">

    <link href="css/plugins/dualListbox/bootstrap-duallistbox.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">


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
                    <span class="m-r-sm text-muted welcome-message">Welcome  <?php echo $_SESSION["name"];?></span>
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
                    <h2>Orders</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="dashboard">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Orders</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>New order</strong>
                        </li>
                    </ol>
                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
           <div class='message'>
                        <?php if ($msg != "") echo $msg . "<br>" ?>
                    </div>  
             
 

            <div class="row">
                <div class="col-lg-12">

                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Add a new order here</h5>
                        </div>
                        <div class="ibox-content">

                            <div class="row">
                                 
                                <div class="col-md-8">
                                    <p>
                                            Select from the menu down here
                                    </p>
                                    <form action="neworder" method="POST">
                                    <label>Table number</label>
                                    <input type="text" class="form-control" name="table">
                                    <br>
                                    <label>Menu</label>
                                    <select name="orders[]" class="select2_demo_2 form-control" multiple="multiple"> 
                                        <?php
                                             $sql = "SELECT * FROM menu";
                                            $run_query = mysqli_query($conn,$sql);
                                            while ( $row= mysqli_fetch_array($run_query)) {
                                            
                                            echo  "<option value=".$row['menu_id'].">".$row['menu_name']."</option>";
                                            }
                                        ?>
                                    </select>
                                    <br>
                                   <button type="submit" name="submit" class="btn btn-w-m btn-success float-right">Order</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
             
            <div class="row" style="visibility: hidden;">
 
                <div class="col-lg-7">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Input Mask <small>http://jasny.github.io/bootstrap/</small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#" class="dropdown-item">Config option 1</a>
                                    </li>
                                    <li><a href="#" class="dropdown-item">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <h3>
                                Input Mask
                            </h3>
                            <p>
                                Input masks allows a user to more easily enter data where you would like them to enter the data in a certain format.
                            </p>
                            <form class="m-t-md" action="#">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-sm-2 col-form-label">ISBN 1</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" data-mask="999-99-999-9999-9" placeholder="">
                                        <span class="form-text">999-99-999-9999-9</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">ISBN 2</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" data-mask="999 99 999 9999 9" placeholder="">
                                        <span class="form-text">999 99 999 9999 9</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">ISBN 3</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" data-mask="999/99/999/9999/9" placeholder="">
                                        <span class="form-text">999/99/999/9999/9</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">IPV4</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" data-mask="999.999.999.9999" placeholder="">
                                        <span class="form-text">192.168.100.200</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tax ID</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" data-mask="99-9999999" placeholder="">
                                        <span class="form-text">99-9999999</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" data-mask="(999) 999-9999" placeholder="">
                                        <span class="form-text">(999) 999-9999</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Currency</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" data-mask="$ 999,999,999.99" placeholder="">
                                        <span class="form-text">$ 999,999,999.99</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Date</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" data-mask="99/99/9999" placeholder="">
                                        <span class="form-text">dd/mm/yyyy</span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Switcher <small>http://abpetkov.github.io/switchery/</small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#" class="dropdown-item">Config option 1</a>
                                    </li>
                                    <li><a href="#" class="dropdown-item">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <h3>
                                Switcher
                            </h3>
                            <p>
                                Is iOS 7 style switches for your checkboxes.
                            </p>
                            <input type="checkbox" class="js-switch" checked />
                            <input type="checkbox" class="js-switch_2" checked />
                            <br/>
                            <br/>
                            <input type="checkbox" class="js-switch_3"  />
                            <input type="checkbox" class="js-switch_4" checked />
                        </div>
                    </div>

                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Custom switch </h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#" class="dropdown-item">Config option 1</a>
                                    </li>
                                    <li><a href="#" class="dropdown-item">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <h4>
                                Custom switch
                            </h4>
                            <p>
                                Pure CSS3 On/Off flipswitches with animated transitions.
                            </p>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" checked class="onoffswitch-checkbox" id="example1">
                                    <label class="onoffswitch-label" for="example1">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" class="onoffswitch-checkbox" id="example2">
                                    <label class="onoffswitch-label" for="example2">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" checked disabled class="onoffswitch-checkbox" id="example3">
                                    <label class="onoffswitch-label" for="example3">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" disabled class="onoffswitch-checkbox" id="example4">
                                    <label class="onoffswitch-label" for="example4">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                    </div>
                    </div>
        
            <div class="row"style="visibility: hidden;">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title  back-change">
                            <h5>Awesome bootstrap checkbox</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#" class="dropdown-item">Config option 1</a>
                                    </li>
                                    <li><a href="#" class="dropdown-item">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">

                                <h4>Checkboxes</h4>
                                <form role="form">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <fieldset>
                                                <legend>
                                                    Basic
                                                </legend>
                                                <p>
                                                    Supports bootstrap theme colors: <code>.abc-checkbox-primary</code>, <code>.abc-checkbox-info</code> etc.
                                                </p>
                                                <div class="form-check abc-checkbox">
                                                    <input class="form-check-input" id="checkbox1" type="checkbox">
                                                    <label class="form-check-label" for="checkbox1">
                                                        Default
                                                    </label>
                                                </div>
                                                <div class="form-check abc-checkbox abc-checkbox-primary">
                                                    <input class="form-check-input" id="checkbox2" type="checkbox" checked="">
                                                    <label class="form-check-label" for="checkbox2">
                                                        Primary
                                                    </label>
                                                </div>
                                                <div class="form-check abc-checkbox abc-checkbox-success">
                                                    <input class="form-check-input" id="checkbox3" type="checkbox">
                                                    <label class="form-check-label" for="checkbox3">
                                                        Success
                                                    </label>
                                                </div>
                                                <div class="form-check abc-checkbox abc-checkbox-info">
                                                    <input class="form-check-input" id="checkbox4" type="checkbox">
                                                    <label class="form-check-label" for="checkbox4">
                                                        Info
                                                    </label>
                                                </div>
                                                <div class="form-check abc-checkbox abc-checkbox-warning">
                                                    <input class="form-check-input" id="checkbox5" type="checkbox" checked="">
                                                    <label class="form-check-label" for="checkbox5">
                                                        Warning
                                                    </label>
                                                </div>
                                                <div class="form-check abc-checkbox abc-checkbox-danger">
                                                    <input class="form-check-input" id="checkbox6" type="checkbox" checked="">
                                                    <label class="form-check-label" for="checkbox6">
                                                        Check me out
                                                    </label>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <fieldset>
                                                <legend>
                                                    Circled
                                                </legend>
                                                <p>
                                                    <code>.abc-checkbox-circle</code> for roundness.
                                                </p>
                                                <div class="form-check abc-checkbox abc-checkbox-circle">
                                                    <input class="form-check-input" id="checkbox7" type="checkbox">
                                                    <label class="form-check-label" for="checkbox7">
                                                        Simply Rounded
                                                    </label>
                                                </div>
                                                <div class="form-check abc-checkbox abc-checkbox-info abc-checkbox-circle">
                                                    <input class="form-check-input" id="checkbox8" type="checkbox" checked="">
                                                    <label class="form-check-label" for="checkbox8">
                                                        Me too
                                                    </label>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <fieldset>
                                                <legend>
                                                    Disabled
                                                </legend>
                                                <p>
                                                    Disabled state also supported.
                                                </p>
                                                <div class="form-check abc-checkbox">
                                                    <input class="form-check-input" id="checkbox9" type="checkbox" disabled="">
                                                    <label class="form-check-label" for="checkbox9">
                                                        Can't check this
                                                    </label>
                                                </div>
                                                <div class="form-check abc-checkbox abc-checkbox-success">
                                                    <input class="form-check-input" id="checkbox10" type="checkbox" disabled="" checked="">
                                                    <label class="form-check-label" for="checkbox10">
                                                        This too
                                                    </label>
                                                </div>
                                                <div class="form-check abc-checkbox abc-checkbox-warning abc-checkbox-circle">
                                                    <input class="form-check-input" id="checkbox11" type="checkbox" disabled="" checked="">
                                                    <label class="form-check-label" for="checkbox11">
                                                        And this
                                                    </label>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <fieldset>
                                                <legend>
                                                    Without label text
                                                </legend>
                                                <div class="form-check abc-checkbox">
                                                    <input class="form-check-input" type="checkbox" id="singleCheckbox1" value="option1" aria-label="Single checkbox One">
                                                    <label class="form-check-label" for="singleCheckbox1"></label>
                                                </div>
                                                <div class="form-check abc-checkbox abc-checkbox-primary">
                                                    <input class="form-check-input" type="checkbox" id="singleCheckbox2" value="option2" checked="" aria-label="Single checkbox Two">
                                                    <label class="form-check-label" for="singleCheckbox2"></label>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <fieldset>
                                                <legend>
                                                    Indeterminate state
                                                </legend>
                                                <div class="form-check abc-checkbox abc-checkbox-primary">
                                                    <input class="form-check-input" id="indeterminateCheckbox" type="checkbox" onclick="changeState(this)">
                                                    <label class="form-check-label" for="indeterminateCheckbox"></label>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <fieldset>
                                                <legend>
                                                    Inline checkboxes
                                                </legend>
                                                <div class="form-check abc-checkbox form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                    <label class="form-check-label" for="inlineCheckbox1"> One </label>
                                                </div>
                                                <div class="form-check abc-checkbox abc-checkbox-success form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option1" checked="">
                                                    <label class="form-check-label" for="inlineCheckbox2"> Two </label>
                                                </div>
                                                <div class="form-check abc-checkbox form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option1">
                                                    <label class="form-check-label" for="inlineCheckbox3"> Three </label>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </form>
                                <h4>Radios</h4>
                                <form role="form">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <fieldset>
                                                <legend>
                                                    Basic
                                                </legend>
                                                <p>
                                                    Supports bootstrap theme colors: <code>.abc-radio-primary</code>, <code>.abc-radio-danger</code> etc.
                                                </p>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-check abc-radio">
                                                            <input class="form-check-input" type="radio" name="radio1" id="radio1" value="option1" checked="">
                                                            <label class="form-check-label" for="radio1">
                                                                Small
                                                            </label>
                                                        </div>
                                                        <div class="form-check abc-radio">
                                                            <input class="form-check-input" type="radio" name="radio1" id="radio2" value="option2">
                                                            <label class="form-check-label" for="radio2">
                                                                Big
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-check abc-radio abc-radio-danger">
                                                            <input class="form-check-input" type="radio" name="radio2" id="radio3" value="option1">
                                                            <label class="form-check-label" for="radio3">
                                                                Next
                                                            </label>
                                                        </div>
                                                        <div class="form-check abc-radio abc-radio-danger">
                                                            <input class="form-check-input" type="radio" name="radio2" id="radio4" value="option2" checked="">
                                                            <label class="form-check-label" for="radio4">
                                                                One
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <fieldset>
                                                <legend>
                                                    Disabled
                                                </legend>
                                                <p>
                                                    Disabled state also supported.
                                                </p>
                                                <div class="form-check abc-radio abc-radio-danger">
                                                    <input class="form-check-input" type="radio" name="radio3" id="radio5" value="option1" disabled="">
                                                    <label class="form-check-label" for="radio5">
                                                        Next
                                                    </label>
                                                </div>
                                                <div class="form-check abc-radio">
                                                    <input class="form-check-input" type="radio" name="radio3" id="radio6" value="option2" checked="" disabled="">
                                                    <label class="form-check-label" for="radio6">
                                                        One
                                                    </label>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <fieldset>
                                                <legend>
                                                    As Checkboxes
                                                </legend>
                                                <p>
                                                    Radios can be made to look like checkboxes.
                                                </p>
                                                <div class="form-check abc-checkbox abc-checkbox">
                                                    <input class="form-check-input" type="radio" name="radio4" id="radio7" value="option1" checked="">
                                                    <label class="form-check-label" for="radio7">
                                                        Default
                                                    </label>
                                                </div>
                                                <div class="form-check abc-checkbox abc-checkbox-success">
                                                    <input class="form-check-input" type="radio" name="radio4" id="radio8" value="option2">
                                                    <label class="form-check-label" for="radio8">
                                                        Success
                                                    </label>
                                                </div>
                                                <div class="form-check abc-checkbox abc-checkbox-danger">
                                                    <input class="form-check-input" type="radio" name="radio4" id="radio9" value="option3">
                                                    <label class="form-check-label" for="radio9">
                                                        Danger
                                                    </label>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <fieldset>
                                                <legend>
                                                    Without label text
                                                </legend>
                                                <div class="form-check abc-radio">
                                                    <input class="form-check-input" type="radio" id="singleRadio1" value="option1" name="radioSingle1" aria-label="Single radio One">
                                                    <label class="form-check-label" for="singleRadio1"></label>
                                                </div>
                                                <div class="form-check abc-radio abc-radio-success">
                                                    <input class="form-check-input" type="radio" id="singleRadio2" value="option2" name="radioSingle1" checked="" aria-label="Single radio Two">
                                                    <label class="form-check-label" for="singleRadio2"></label>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <fieldset>
                                                <legend>
                                                    Inline radios
                                                </legend>
                                                <div class="form-check abc-radio abc-radio-info form-check-inline">
                                                    <input class="form-check-input" type="radio" id="inlineRadio1" value="option1" name="radioInline" checked="">
                                                    <label class="form-check-label" for="inlineRadio1"> Inline One </label>
                                                </div>
                                                <div class="form-check abc-radio form-check-inline">
                                                    <input class="form-check-input" type="radio" id="inlineRadio2" value="option2" name="radioInline">
                                                    <label class="form-check-label" for="inlineRadio2"> Inline Two </label>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
                include ("footer.php");
            ?>

        </div>
                    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

   <!-- JSKnob -->
   <script src="js/plugins/jsKnob/jquery.knob.js"></script>

   <!-- Input Mask-->
    <script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>

   <!-- Data picker -->
   <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>

   <!-- NouSlider -->
   <script src="js/plugins/nouslider/jquery.nouislider.min.js"></script>

   <!-- Switchery -->
   <script src="js/plugins/switchery/switchery.js"></script>

    <!-- IonRangeSlider -->
    <script src="js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>

    <!-- MENU -->
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Color picker -->
    <script src="js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

    <!-- Clock picker -->
    <script src="js/plugins/clockpicker/clockpicker.js"></script>

    <!-- Image cropper -->
    <script src="js/plugins/cropper/cropper.min.js"></script>

    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="js/plugins/fullcalendar/moment.min.js"></script>

    <!-- Date range picker -->
    <script src="js/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- Select2 -->
    <script src="js/plugins/select2/select2.full.min.js"></script>

    <!-- TouchSpin -->
    <script src="js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>

    <!-- Tags Input -->
    <script src="js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <!-- Dual Listbox -->
    <script src="js/plugins/dualListbox/jquery.bootstrap-duallistbox.js"></script>

    <script>
        $(document).ready(function(){

            $('.tagsinput').tagsinput({
                tagClass: 'label label-primary'
            });

            var $image = $(".image-crop > img")
            var $cropped = $($image).cropper({
                aspectRatio: 1.618,
                preview: ".img-preview",
                done: function(data) {
                    // Output the result data for cropping image.
                }
            });

            var $inputImage = $("#inputImage");
            if (window.FileReader) {
                $inputImage.change(function() {
                    var fileReader = new FileReader(),
                            files = this.files,
                            file;

                    if (!files.length) {
                        return;
                    }

                    file = files[0];

                    if (/^image\/\w+$/.test(file.type)) {
                        fileReader.readAsDataURL(file);
                        fileReader.onload = function () {
                            $inputImage.val("");
                            $image.cropper("reset", true).cropper("replace", this.result);
                        };
                    } else {
                        showMessage("Please choose an image file.");
                    }
                });
            } else {
                $inputImage.addClass("hide");
            }

            $("#download").click(function (link) {
                link.target.href = $cropped.cropper('getCroppedCanvas', { width: 620, height: 520 }).toDataURL("image/png").replace("image/png", "application/octet-stream");
                link.target.download = 'cropped.html';
            });


            $("#zoomIn").click(function() {
                $image.cropper("zoom", 0.1);
            });

            $("#zoomOut").click(function() {
                $image.cropper("zoom", -0.1);
            });

            $("#rotateLeft").click(function() {
                $image.cropper("rotate", 45);
            });

            $("#rotateRight").click(function() {
                $image.cropper("rotate", -45);
            });

            $("#setDrag").click(function() {
                $image.cropper("setDragMode", "crop");
            });

            var mem = $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            var yearsAgo = new Date();
            yearsAgo.setFullYear(yearsAgo.getFullYear() - 20);

            $('#selector').datepicker('setDate', yearsAgo );


            $('#data_2 .input-group.date').datepicker({
                startView: 1,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                format: "dd/mm/yyyy"
            });

            $('#data_3 .input-group.date').datepicker({
                startView: 2,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });

            $('#data_4 .input-group.date').datepicker({
                minViewMode: 1,
                keyboardNavigation: false,
                forceParse: false,
                forceParse: false,
                autoclose: true,
                todayHighlight: true
            });

            $('#data_5 .input-daterange').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });

            var elem = document.querySelector('.js-switch');
            var switchery = new Switchery(elem, { color: '#1AB394' });

            var elem_2 = document.querySelector('.js-switch_2');
            var switchery_2 = new Switchery(elem_2, { color: '#ED5565' });

            var elem_3 = document.querySelector('.js-switch_3');
            var switchery_3 = new Switchery(elem_3, { color: '#1AB394' });

            var elem_4 = document.querySelector('.js-switch_4');
            var switchery_4 = new Switchery(elem_4, { color: '#f8ac59' });
                switchery_4.disable();

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });

            $('.demo1').colorpicker();

            var divStyle = $('.back-change')[0].style;
            $('#demo_apidemo').colorpicker({
                color: divStyle.backgroundColor
            }).on('changeColor', function(ev) {
                        divStyle.backgroundColor = ev.color.toHex();
                    });

            $('.clockpicker').clockpicker();

            $('input[name="daterange"]').daterangepicker();

            $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

            $('#reportrange').daterangepicker({
                format: 'MM/DD/YYYY',
                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
                minDate: '01/01/2012',
                maxDate: '12/31/2015',
                dateLimit: { days: 60 },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'right',
                drops: 'down',
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-primary',
                cancelClass: 'btn-default',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    cancelLabel: 'Cancel',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            }, function(start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            });

            $(".select2_demo_1").select2({
                theme: 'bootstrap4',
            });
            $(".select2_demo_2").select2({
                theme: 'bootstrap4',
            });
            $(".select2_demo_3").select2({
                theme: 'bootstrap4',
                placeholder: "Select a state",
                allowClear: true
            });


            $(".touchspin1").TouchSpin({
                buttondown_class: 'btn btn-white',
                buttonup_class: 'btn btn-white'
            });

            $(".touchspin2").TouchSpin({
                min: 0,
                max: 100,
                step: 0.1,
                decimals: 2,
                boostat: 5,
                maxboostedstep: 10,
                postfix: '%',
                buttondown_class: 'btn btn-white',
                buttonup_class: 'btn btn-white'
            });

            $(".touchspin3").TouchSpin({
                verticalbuttons: true,
                buttondown_class: 'btn btn-white',
                buttonup_class: 'btn btn-white'
            });

            $('.dual_select').bootstrapDualListbox({
                selectorMinimalHeight: 160
            });


        });



        $("#ionrange_1").ionRangeSlider({
            skin: "flat",
            min: 0,
            max: 5000,
            type: 'double',
            prefix: "$",
            maxPostfix: "+",
            grid: true
        });

        $("#ionrange_2").ionRangeSlider({
            skin: "flat",
            min: 0,
            max: 10,
            type: 'single',
            step: 0.1,
            postfix: " carats",
            grid: true
        });

        $("#ionrange_3").ionRangeSlider({
            skin: "flat",
            min: -50,
            max: 50,
            from: 0,
            postfix: "°",
            grid: true
        });

        $(".dial").knob();

        var basic_slider = document.getElementById('basic_slider');

        noUiSlider.create(basic_slider, {
            start: 40,
            behaviour: 'tap',
            connect: 'upper',
            range: {
                'min':  20,
                'max':  80
            }
        });

        var range_slider = document.getElementById('range_slider');

        noUiSlider.create(range_slider, {
            start: [ 40, 60 ],
            behaviour: 'drag',
            connect: true,
            range: {
                'min':  20,
                'max':  80
            }
        });

        var drag_fixed = document.getElementById('drag-fixed');

        noUiSlider.create(drag_fixed, {
            start: [ 40, 60 ],
            behaviour: 'drag-fixed',
            connect: true,
            range: {
                'min':  20,
                'max':  80
            }
        });


    </script>

</body>



</html>
