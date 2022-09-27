<?php

session_start();
require("../config.php");
require("../functions.php");
$arr_id=$_POST['arr_id'];
$check_in=date('d-m-Y');
$check_out=date('d-m-Y');
delCartItem($arr_id);
print_r($_SESSION["cart_item"]);
