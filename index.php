<?php

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
        $content="rooms.php";
        break;
    default:
       $content="home.php";

        break;
}

require_once($content);
