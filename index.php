<?php




$content="home.php";
$view=(isset($_GET['p'])&& $_GET['p']!=='') ? $_GET['p'] : '';

switch ($view) {
    case 'home':
        $content="pages/home/index.php";
        break;
    case 'about':
        $content="pages/about/index.php";
        break;

    case 'contact':
        $content="pages/contact/index.php";
        break;

    case 'events':
        $content="pages/events/index.php";
        break;
    case 'reservation':
        $content="pages/reservation/index.php";
        break;
    case 'rooms':
        $content="pages/rooms/index.php";
        break;
    default:
        $content="pages/home/index.php";

        break;
}

require_once($content);
