<?php

require("../../includes/config.php");
require("../../includes/functions.php");
require("../includes/functions.php");


if ($_SERVER['REQUEST_METHOD']=="POST") {
    if (isset($_POST['id']) && isset($_POST['status'])) {
        $out=changeStatus($_POST['id'], $_POST['status']);
        echo $out;
    } else {
        echo false;
    }
}
