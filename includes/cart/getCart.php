<?php

session_start();
require("../config.php");
require("../functions.php");
$content="";
if ($_GET["t"]="main") {
    $content=cartContent();
} else {
    $content=mcartContent();
}
$arr=[
    "content"=>$content,
    "count"=>count($_SESSION["cart_item"]),
    "total"=>$_SESSION["cart_total"]
];

echo json_encode($arr);
