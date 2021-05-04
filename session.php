<?php
session_start();
if(!isset($_SESSION['name']) || empty($_SESSION['name'])){
    
      echo "<script>window.location = 'index.php'</script>";
    }

?>
