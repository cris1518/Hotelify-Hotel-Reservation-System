<?php

session_start();
require("../../includes/initialize.php");


if (!empty($_SESSION['cart_item'])) {
    foreach ($_SESSION['cart_item'] as $k=>$v) {
        newReservation(
            $v['id'],
            $v['person'],
            $v['price'],
            $v['check_in'],
            $v['check_out'],
            $USER_INFO['id'],
            $_POST['name'],
            $_POST['surname'],
            $_POST['phone'],
            $_POST['email'],
            $_POST['address'],
            $_POST['province'],
            $_POST['zipcode'],
            $_POST['state'],
            $_POST['payment-method']
        )
        ;
        emptyCart();
    }
} else {
}
