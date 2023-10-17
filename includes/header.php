
<?php



include '../code/fetch_brgy_info.php'

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title class="generate">Brgy. LDG Clearance Automate</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../css/sweetalert.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="../text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/Brgy-logo.png" />
  <script src="https://kit.fontawesome.com/89c7bdb9b2.js" crossorigin="anonymous"></script>
  <style>
    .menu-icon{
      margin-top: -.4rem!important;
    }
    /* @media print {
      header, footer, nav, aside, title, .card-header, .generate, button, .navbar, .swal2-popup{
        display : none !important;
      }

      body  {
          z-index: 100 !important;
          visibility: visible !important;
          position: relative !important;
          display: block !important;
          background-color: lightgray !important;
          height: 297mm !important;
          width: 211mm !important;
          position: relative !important;

          padding: 0px;
          top: 0 !important;
          left: 0 !important;
          margin: 0 !important;
          orphans: 0!important;
          widows: 0!important;
          overflow: visible !important;
          page-break-after: always;

      }
      @page{
      size: A4;
      margin: 0mm ;
      orphans: 0!important;
      widows: 0!important;
      }
    } */
<style>

.tooltip{
  
  font-size: large;
  z-index: 100000000; /* Use half of the width (120/2 = 60), to center the tooltip */
}

</style>
  </style>
</head>
<body>

<script>
  $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
