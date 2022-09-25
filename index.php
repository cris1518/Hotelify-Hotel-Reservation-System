<?php


// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === false) {
    header("location: login.php");
    exit;
}


$content="home.php";
$view=(isset($_GET['p'])&& $_GET['p']!=='') ? $_GET['p'] : '';

switch ($view) {
    case 'home':
        $content="home.php";
        break;
    case 'about':
        $content="about.php";
        break;

    case 'contact':
        $content="contact.php";
        break;

    case 'events':
        $content="events.php";
        break;
    case 'reservation':
        $content="reservation.php";
        break;
    case 'rooms':
        $content="rooms/index.php";
        break;
    default:
        $content="home.php";

        break;
}

require_once($content);
