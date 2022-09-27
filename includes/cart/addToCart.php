<?php

session_start();
require("../config.php");
require("../functions.php");
$id=$_POST['id'];
$room=getRoom($id);

$check_in=date('d-m-Y');
$check_out=date('d-m-Y');
addToCart($id, $room['Nome'], 1, $room['Prezzo'], $room['Immagine'], $check_in, $check_out);
print_r($_SESSION["cart_item"]);
