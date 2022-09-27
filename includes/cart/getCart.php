<?php

session_start();
require("../config.php");
require("../functions.php");
$arr=[
    "content"=>mcartContent(),
    "count"=>count($_SESSION["cart_item"])
];

echo json_encode($arr);
