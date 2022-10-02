<?php





require("config.php");
require("functions.php");

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    $USER_INFO=getUser($_SESSION["id"]);
}
