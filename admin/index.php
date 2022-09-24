<?php

require("../includes/config.php");
require("../includes/functions.php");


// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["admin_loggedin"]) && $_SESSION["admin_loggedin"] === false) {
    header("location: admin/login.php");
    exit;
}

if (isset($_GET['p'])==false) {
    $_GET['p']="dashboard";
}
?>

<!DOCTYPE html>


<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Hotelify Dashboard</title>

  <meta name="description" content="" />


  <?php require_once("includes/head.php") ?>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
              <img src="images/hotel.png">
              <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                  <g id="Icon" transform="translate(27.000000, 15.000000)">
                    <g id="Mask" transform="translate(0.000000, 8.000000)">
                      <mask id="mask-2" fill="white">
                        <use xlink:href="#path-1"></use>
                      </mask>
                      <use fill="#696cff" xlink:href="#path-1"></use>
                      <g id="Path-3" mask="url(#mask-2)">
                        <use fill="#696cff" xlink:href="#path-3"></use>
                        <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                      </g>
                      <g id="Path-4" mask="url(#mask-2)">
                        <use fill="#696cff" xlink:href="#path-4"></use>
                        <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                      </g>
                    </g>
                    <g id="Triangle"
                      transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) ">
                      <use fill="#696cff" xlink:href="#path-5"></use>
                      <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                    </g>
                  </g>
                </g>
              </g>
              </svg>
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2" style="text-transform:unset !important"
              ;>Hotelify</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">

          <li
            class="menu-item <?php echo($_GET['p']=='dashboard' ? 'active' : '') ?>">
            <a href="index.php?p=dashboard" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Analytics">Dashboard</div>
            </a>
          </li>

          <li
            class="menu-item <?php echo($_GET['p']=='rooms' ? 'active' : '') ?>">
            <a href="index.php?p=rooms" class="menu-link">
              <i class="menu-icon tf-icons bx bx-bed"></i>
              <div data-i18n="Analytics">Stanze</div>
            </a>
          </li>

          <li
            class="menu-item <?php echo($_GET['p']=='reservation' ? 'active' : '') ?>">
            <a href="index.php?p=reservation" class="menu-link">
              <i class="menu-icon tf-icons bx bx-calendar"></i>
              <div data-i18n="Analytics">Prenotazioni</div>
            </a>
          </li>

          <li
            class="menu-item <?php echo($_GET['p']=='users' ? 'active' : '') ?>">
            <a href="index.php?p=users" class="menu-link">
              <i class="menu-icon tf-icons bx bx-user"></i>
              <div data-i18n="Analytics">Utenti</div>
            </a>
          </li>

        </ul>
      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">


        <?php
        $content="dashboard/index.php";

switch($_GET['p']) {
    case 'dashboard':
        $content="dashboard/index.php";
        break;

    case 'rooms':
        $content="rooms/index.php";
        break;

    case 'reservation':
        $content="reservation/index.php";
        break;

    case 'users':
        $content="users/index.php";
        break;



    default:
        $content="dashboard/index.php";
        break;
}

require_once($content);

?>



        <div class="content-backdrop fade"></div>
      </div>
      <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
  </div>

  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->



  <?php require_once("includes/js.php") ?>
</body>

</html>