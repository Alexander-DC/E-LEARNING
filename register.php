<?php  
require_once ("include/initialize.php"); 
if (isset($_SESSION['StudentID'])) {
  # code...
  redirect('index.php');
}
?>

 
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="<?php echo web_root;?>plugins/registration/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="<?php echo web_root;?>plugins/registration/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="<?php echo web_root;?>plugins/registration/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo web_root;?>plugins/registration/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo web_root;?>plugins/registration/css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div> <!--Imagen encabezado-->
                <div class="card-body">
                    <h2 class="title">Registration Info</h2>
                    <form method="POST" action="register.php">
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Firstname" name="FNAME">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Lastname" name="LNAME">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Address" name="ADDRESS">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="number" placeholder="Phone" name="PHONE">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Username" name="USERNAME">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="password" placeholder="Password" name="PASS">
                        </div>

                      
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="btnRegister">Submit</button>
                            <a href="login.php">Back to Login</a>
                        </div>
                    </form>
                    <?php 
if (isset($_POST['btnRegister'])) {
    
    if($_POST['FNAME']!='' or  $_POST['LNAME']!=""or  $_POST['ADDRESS']!=""or  $_POST['PHONE']!=""or  $_POST['USERNAME']!=""or  $_POST['PASS']!="" ){
    $student = New Student(); 
    $student->Fname         = $_POST['FNAME']; 
    $student->Lname         = $_POST['LNAME'];
    $student->Address       = $_POST['ADDRESS']; 
    $student->MobileNo         = $_POST['PHONE'];  
    $student->STUDUSERNAME      = $_POST['USERNAME'];
    $student->STUDPASS      = sha1($_POST['PASS']); 
    $student->create();  

    
    
    ?><div class="alert alert-success mt-4" role="alert">
    Creado Exitosamente
  </div>
    <?php
    }else{
        ?> <div class="alert alert-danger mt-4" role="alert">
        Por Favor complete todos los campos
      </div>
      <?php
    }
}

?> 
                </div>
                
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="<?php echo web_root;?>plugins/registration/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="<?php echo web_root;?>plugins/registration/vendor/select2/select2.min.js"></script>
    <script src="<?php echo web_root;?>plugins/registration/vendor/datepicker/moment.min.js"></script>
    <script src="<?php echo web_root;?>plugins/registration/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
    <!-- Bootstrap JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->




