 <?php

 $rootAfter = $_SERVER['REQUEST_URI'];
$dir_array = parse_url($rootAfter);
preg_match('@/(?<path>[^/]+)@', $dir_array['path'], $x);
$folderName = $x['path'];
$baseurl='http://'.$_SERVER['SERVER_NAME']."/".
$folderName;

?>

 <!-- Core JS -->
 <!-- build:js assets/vendor/js/core.js -->
 <script src="<?php echo 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName."/admin/"?>assets/vendor/libs/jquery/jquery.js"></script>
 <script src="<?php echo 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName."/admin/"?>assets/vendor/libs/popper/popper.js"></script>
 <script src="<?php echo 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName."/admin/"?>assets/vendor/js/bootstrap.js"></script>
 <script
     src="<?php echo 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName."/admin/"?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js">
 </script>

 <script src="<?php echo 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName."/admin/"?>assets/vendor/js/menu.js"></script>
 <!-- endbuild -->

 <!-- Vendors JS -->
 <script src="<?php echo 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName."/admin/"?>assets/vendor/libs/apex-charts/apexcharts.js"></script>

 <!-- Main JS -->
 <script src="<?php echo 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName."/admin/"?>assets/js/main.js"></script>

 <!-- Page JS -->
 <script src="<?php echo 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName."/admin/"?>assets/js/dashboards-analytics.js"></script>

 <!-- Global Functions JS -->
 <script src="<?php echo 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName."/admin/"?>js/main.js"></script>

 <!-- Place this tag in your head or just before your close body tag. -->
 <script async defer src="https://buttons.github.io/buttons.js"></script>
 <!-- TinyMCE -->
 <script src="<?php echo 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName."/admin/"?>libs/tinymce/tinymce.min.js"></script>

 <!-- jQuery Datatables-->
 <script src="<?php echo 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName."/admin/"?>libs/datatables/datatables.min.js"></script>