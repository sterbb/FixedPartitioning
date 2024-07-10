<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>FIXED PARTITION</title>
  <link rel="icon" href="views/images/DISC.png" type="image/x-icon">

    <!-- App css -->
    <link href="views/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="views/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="views/assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
    <link href="views/assets/css/style.css" rel="stylesheet" type="text/css" />
    <script src="views/assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="views/assets/plugins/animate/animate.min.css" type="text/css">
    <link rel="stylesheet" href="views/assets/plugins/animate/animate.css"  type="text/css">

    

  <body class="bg-theme bg-theme9">
   <?php
    echo '<div id="wrapper">'; 
      if(isset($_GET["route"])){
        if ($_GET["route"] == 'home' ||
            $_GET["route"] == 'table' ) {
          include "modules/".$_GET["route"].".php";
        }else{
           include "modules/404.php";
        }
      }else{
        include "modules/home.php";
      }
    echo '</div>';
  ?>

   <!-- jQuery  -->
   <script src="views/assets/js/jquery.min.js"></script>
        <script src="views/assets/js/bootstrap.bundle.min.js"></script>
        <script src="views/assets/js/metisMenu.min.js"></script>
        <script src="views/assets/js/waves.min.js"></script>
        <script src="views/assets/js/jquery.slimscroll.min.js"></script>

        <!-- App js -->
        <script src="views/assets/js/app.js"></script>
        <script src="views/js/helper.js"></script>
        <script src="views/js/script.js"></script>
</body>
</html>

