<?php


$rootAfter = $_SERVER['REQUEST_URI'];
$dir_array = parse_url($rootAfter);
preg_match('@/(?<path>[^/]+)@', $dir_array['path'], $x);
$folderName = $x['path'];
$baseurl='http://'.$_SERVER['SERVER_NAME']."/".
$folderName;


?>
<link rel="stylesheet" href="<?php echo 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName."/"?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName."/"?>css/main.css">
<link rel="stylesheet" type="text/css"
    href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700">

<link rel="stylesheet" href="<?php echo 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName."/"?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName."/"?>css/animate.css">
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName."/"?>css/aos.css">
<link rel="stylesheet" href="<?php echo 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName."/"?>css/bootstrap-datepicker.css">
<link rel="stylesheet" href="<?php echo 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName."/"?>css/jquery.timepicker.css">
<link rel="stylesheet" href="<?php echo 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName."/"?>css/fancybox.min.css">

<link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
<link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName."/"?>css/style.css">

<link href="<?php echo 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName."/"?>/assets/fontawesome/css/fontawesome.css" rel="stylesheet">
<link href="<?php echo 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName."/"?>/assets/fontawesome/css/brands.css" rel="stylesheet">
<link href="<?php echo 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName."/"?>/assets/fontawesome/css/solid.css" rel="stylesheet">