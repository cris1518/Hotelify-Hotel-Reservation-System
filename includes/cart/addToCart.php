<?php

session_start();
require("../config.php");
require("../functions.php");
$id=$_POST['id'];
$person=$_POST['person'];
$room=getRoom($id);

$check_in=date($_POST["check-in"]);
$check_out=date($_POST["check-out"]);
addToCart($id, $room['Nome'], 1, $room['Prezzo'], $room['Immagine'], $check_in, $check_out, $_POST["person"]);
print_r($_SESSION["cart_item"]);
