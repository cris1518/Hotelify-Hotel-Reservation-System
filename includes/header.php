<?php

session_start();

$rootAfter = $_SERVER['REQUEST_URI'];
$dir_array = parse_url($rootAfter);
preg_match('@/(?<path>[^/]+)@', $dir_array['path'], $x);
$folderName = $x['path'];
$wurl= 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName;?>


<header class="site-header js-site-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-6 col-lg-4 site-logo" data-aos="fade"><a href="index.html">Hotelify</a></div>
            <div class="col-6 col-lg-8">


                <div class="site-menu-toggle js-site-menu-toggle" data-aos="fade">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <!-- END menu-toggle -->

                <?php

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    //USER MENU
    echo '
      <div class="dropdown" style="
    float: right;
    right: 20px;
    top: -10px;
">
                    <button class="btn btn-secondary dropdown" type="button" id="account-nav"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-user userman"></i>

                    </button>
                    <div class="dropdown-menu" aria-labelledby="account-nav">
                        <a class="dropdown-item"  href="'.$wurl.'/user/user.php">Account</a>
                        <a class="dropdown-item" href="#">Prenotazioni</a>
                        <a class="dropdown-item"
                            href="'.$wurl.'/logout.php" >Logout</a>
                    </div>
                </div>
    
    ';


    //CART MENU

    $cart_count=0;
    if (!empty($_SESSION["cart_item"])) {
        $cart_count=count($_SESSION["cart_item"]);
    }

    $cart_content=mcartContent();

    echo '
      <div class="dropdown" style="
    float: right;
    right: 25px;
    top: -10px;
">
                    <button class="btn btn-secondary dropdown" type="button" id="cart-nav"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-shopping-cart 
                         userman"></i>&nbsp;&nbsp;<span class="badge badge-light" id="cart-count">'.$cart_count.'</span>

                    </button>
                    <div class="dropdown-menu cart-cont" aria-labelledby="cart-nav" >
                   
                     <table class="table table-bordered table-sm" id="mcart-table">
  
  <tbody id="mcart-body">
  '.$cart_content.'
  </tbody>
</table>';

    if ($cart_content!=="") {
        echo' <button class="btn btn-light" id="btn-cart-empty" onclick="emptyCart()"><i class="fa fa-trash"></i> SVUOTA CESTINO</button>';
    } else {
        echo' <button class="btn btn-light" id="btn-cart-empty" onclick="emptyCart()" style="display:none"><i class="fa fa-trash"></i> SVUOTA CESTINO</button>';
    }

    echo '


                    </div>
                </div>
    
    ';
} else {
    echo '<a href="'.$wurl.'/login.php" ><div type="button" style="
    float: right;
    margin-right: 20px;
    margin-top: -10px;
    " class="btn btn-secondary"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   &nbsp;<i class="fas fa-user userman"></i>Accedi</div></a>';
}  ?>

                <div class="site-navbar js-site-navbar">

                    <nav role="navigation">

                        <div class="container">
                            <div class="row full-height align-items-center">

                                <div class="col-md-6 mx-auto">
                                    <ul class="list-unstyled menu">
                                        <li class="active"><a
                                                href="<?php echo  $wurl."/" ?>index.php?p=home">Home</a>
                                        </li>
                                        <li><a
                                                href="<?php echo  $wurl."/" ?>index.php?p=rooms">Rooms</a>
                                        </li>
                                        <li><a
                                                href="<?php echo  $wurl."/" ?>index.php?p=about">About</a>
                                        </li>
                                        <li><a
                                                href="<?php echo  $wurl."/" ?>index.php?p=events">Events</a>
                                        </li>
                                        <li><a
                                                href="<?php echo  $wurl."/" ?>index.php?p=contact">Contact</a>
                                        </li>
                                        <li><a
                                                href="<?php echo  $wurl."/" ?>index.php?p=reservation">Reservation</a>
                                        </li>


                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>