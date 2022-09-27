<?php

session_start();
require("../config.php");
require("../functions.php");
emptyCart();
echo !isset($_SESSION["cart_item"]);
