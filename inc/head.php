
<?php 
session_start();
$url= 'http://localhost/whiteapp/';

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Page Title -->
   <title>CIMS - 3rd Party App</title>

   <!-- Meta Data -->
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta http-equiv="content-type" content="text/html; charset=utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="keywords" content="">

   <!-- Favicon -->
   <link rel="shortcut icon" href="assets/img/favicon.png">

   <!-- Web Fonts -->
   <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&display=swap" rel="stylesheet">
   
   <!-- ======= BEGIN GLOBAL MANDATORY STYLES ======= -->
   <link rel="stylesheet" href="<?php echo $url; ?>assets/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="<?php echo $url; ?>assets/fonts/icofont/icofont.min.css">
   <link rel="stylesheet" href="<?php echo $url; ?>assets/plugins/perfect-scrollbar/perfect-scrollbar.min.css">
  
  
   <!-- ======= END BEGIN GLOBAL MANDATORY STYLES ======= -->

   
   <!-- ======= BEGIN PAGE LEVEL PLUGINS STYLES ======= -->
   <link rel="stylesheet" href="<?php echo $url; ?>assets/plugins/datepicker/datepicker.min.css">
   <!-- ======= END BEGIN PAGE LEVEL PLUGINS STYLES ======= -->
   <!-- ### datatable -->
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">


   
   <!-- ======= BEGIN PAGE LEVEL PLUGINS STYLES ======= -->
   <link rel="stylesheet" href="<?php echo $url; ?>assets/plugins/apex/apexcharts.css">
   <!-- ======= END BEGIN PAGE LEVEL PLUGINS STYLES ======= -->

   <!-- ======= MAIN STYLES ======= -->
   <link rel="stylesheet" href="<?php echo $url; ?>assets/css/style.css">
   <!-- ======= END MAIN STYLES ======= -->
  <!--  icon -------------------------------->
   <link rel="stylesheet" href="<?php echo $url; ?>assets/fonts/et-lineicon/et-lineicons.css">
   <link rel="stylesheet" href="<?php echo $url; ?>assets/fonts/themify-icons/themify-icons.css">


<style>
  .dataTables_filter{
   margin: 20px;
  }
  .dt-buttons button:hover{
      color: #000000;
    background: #12006E;
    border: none;
   }
   .dt-buttons .buttons-excel{
      color: #ffffff;
    background: #6045e2;
    border: none;
   }
   .dt-buttons{
      margin:20px
   }
</style>

</head>

<body>

   <!-- Offcanval Overlay -->
   <div class="offcanvas-overlay"></div>
   <!-- Offcanval Overlay -->

   <!-- Wrapper -->
   <div class="wrapper">