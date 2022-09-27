<?php


//GET THE WEBSITE BASE URL
function getSiteUrl()
{
    $rootAfter = $_SERVER['REQUEST_URI'];
    $dir_array = parse_url($rootAfter);
    preg_match('@/(?<path>[^/]+)@', $dir_array['path'], $x);
    $folderName = $x['path'];
    return 'http://'.$_SERVER['SERVER_NAME']."/".
$folderName;
}

//GENERATE A RANDOM STRING
function genUniq($length = 20)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}



function dbconn($host, $dbname, $username, $password)
{
    $conn=new mysqli($host, $username, $password, $dbname);

    if ($conn === false) {
        return [

            "errors"=>$conn->connect_error
        ];
    } else {
        return $conn;
    }
}



//GET ALL THE ROOMS IN THE DB
function RoomsList()
{
    $conn=dbconn(DBHOST, DBNAME, DBUSERNAME, DBPASSWORD);
    $sql="SELECT * FROM stanze";
    $res=$conn->query($sql);

    if (empty($res->error)==false) {
        return false;
    } else {
        while ($row=$res->fetch_array()) {
            echo ' <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up">
          <a href="pages/rooms/room.php?id='.$row['id'].'" class="room">
            <figure class="img-wrap">
              <img  src="'.getSiteUrl().'/images/'.$row['Immagine'].'" alt="Free website template" class="img-fluid mb-3 usr-img-room">
            </figure>
            <div class="p-3 text-center room-info">
              <h2>'.$row['Nome'].'</h2>
                
              <span class="text-uppercase letter-spacing-1"> '.$row['Prezzo'].'€ / a notte</span>
            </div>
          </a>
        </div>';
        }
        $conn->close();


        return $out;
    }
}


//GET THE INFO OF A SPECIFIC ROOM
function getRoom($id)
{
    $conn=dbconn(DBHOST, DBNAME, DBUSERNAME, DBPASSWORD);
    $sql="SELECT * FROM stanze WHERE id=$id";
    $res=$conn->query($sql);
    $out=$res->fetch_assoc();

    $conn->close();
    return $out;
}


function getUser($id)
{
    $conn=dbconn(DBHOST, DBNAME, DBUSERNAME, DBPASSWORD);
    $sql="SELECT * FROM users WHERE id=$id";
    $res=$conn->query($sql);
    $out=$res->fetch_assoc();

    $conn->close();
    return $out;
}


function updateUser($id, $name, $surname, $phone, $email)
{
    $conn=dbconn(DBHOST, DBNAME, DBUSERNAME, DBPASSWORD);
    $sql="UPDATE users SET Nome='$name',Cognome='$surname',Telefono='$phone',Email='$email' WHERE id=$id";
    $res=$conn->query($sql);
    $conn->close();
    header("Location:".getSiteUrl()."/user/user.php");
}


function addToCart($pid, $name, $qty, $price, $image, $check_in, $check_out)
{
    $conn=dbconn(DBHOST, DBNAME, DBUSERNAME, DBPASSWORD);

    $sql="SELECT * FROM stanze where id=$pid";
    $result=$conn->query($sql);


    $itemArray = array('id'=>$pid,'name'=>$name,  'quantity'=>$qty, 'price'=>$price, 'image'=>$image,
    'check_in'=>$check_in,'check_out'=>$check_out);
    //check cart session


    if (!empty($_SESSION["cart_item"])) {
        $_SESSION["cart_item"][] = $itemArray;
    } else {
        $_SESSION["cart_item"] = [$itemArray];
    }

    $conn->close();
}

function mcartContent()
{
    $out="";
    if (!empty($_SESSION['cart_item'])) {
        $i=0;
        foreach ($_SESSION['cart_item'] as $k=>$v) {
            $out.="  <tr>
      <td width='20%'><img class='mcart-product-img' src='".getSiteUrl()."/images/".$v['image']."'></td>
      <td width='20%'>".$v['name']."</td>
      <td width='10%'>".$v['price']."</td>
      <td width='20%'>".$v['check_in']."<br>".$v['check_out']."</td>
      <td width='20%'><button type='button' class='btn btn-light' onclick='delCartItem($i)' ><i class='fa fa-trash' ></i></button></td>
    </tr>";
            ++$i;
        }
        return $out;
    } else {
        return "";
    }
}


function delCartItem($arr_id)
{
    print_r($arr_id);

    unset($_SESSION["cart_item"][$arr_id]);
    $_SESSION["cart_item"] = array_values($_SESSION["cart_item"]);
}



function emptyCart()
{
    unset($_SESSION["cart_item"]);
}
