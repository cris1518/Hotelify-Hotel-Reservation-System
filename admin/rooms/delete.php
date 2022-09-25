<?php

require("../../includes/config.php");
require("../../includes/functions.php");
require("../includes/functions.php");


if ($_SERVER['REQUEST_METHOD']=="POST") {
    if (isset($_POST['id'])) {
        $out=delRoom($_POST['id']);
        echo $out;
    } else {
        echo false;
    }
}
