<?php


$rootAfter = $_SERVER['REQUEST_URI'];
$dir_array = parse_url($rootAfter);
preg_match('@/(?<path>[^/]+)@', $dir_array['path'], $x);
$folderName = $x['path'];
$baseurl='http://'.$_SERVER['SERVER_NAME']."/".
$folderName;
?>

<script src="<?php echo 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName."/"?>js/jquery-3.3.1.min.js"></script>
<script src="<?php echo 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName."/"?>js/jquery-migrate-3.0.1.min.js"></script>
<script src="<?php echo 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName."/"?>js/popper.min.js"></script>
<script src="<?php echo 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName."/"?>js/bootstrap.min.js"></script>
<script src="<?php echo 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName."/"?>js/owl.carousel.min.js"></script>
<script src="<?php echo 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName."/"?>js/jquery.stellar.min.js"></script>
<script src="<?php echo 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName."/"?>js/jquery.fancybox.min.js"></script>
<script src="<?php echo 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName."/"?>js/aos.js"></script>
<script src="<?php echo 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName."/"?>js/bootstrap-datepicker.js"></script>
<script src="<?php echo 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName."/"?>js/jquery.timepicker.min.js"></script>
<script src="<?php echo 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName."/"?>js/main.js"></script>