<?php


//GET ALL THE ROOMS IN THE DB
function AdmRoomsList()
{
    $conn=dbconn(DBHOST, DBNAME, DBUSERNAME, DBPASSWORD);
    $sql="SELECT * FROM stanze";
    $res=$conn->query($sql);

    if (empty($res->error)==false) {
        return false;
    } else {
        while ($row=$res->fetch_array()) {
            echo '<div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100">
                <img class="card-img-top card-room-img adm-img-room" src="'.getSiteUrl().'/images/'.$row['Immagine'].'" alt="Card image cap" />
                <div class="card-body">
                    <h5 class="card-title">'.$row['Nome'].'</h5>
                    <p class="card-text">
                        '.$row['Breve_Descrizione'].'
                    </p>
                    <a href="rooms/edit.php?t=edit&id='.$row['id'].'" class="btn btn-outline-primary">Modifica</a>
                    <button type="button"  onclick="delRoom('.$row['id'].')" class="btn btn-outline-danger">Elimina</button>
                </div>
            </div>
        </div>
     ';
        }
        $conn->close();


        return $out;
    }
}

//FUNCTION THAT CREATE A ROOM
function createRoom($name, $price, $short_desc, $desc, $room_num, $person_num, $image)
{
    $nwimage=genUniq()."_".$image['name'];
    move_uploaded_file($_FILES['img']['tmp_name'], "../../images/". $nwimage);
    $conn=dbconn(DBHOST, DBNAME, DBUSERNAME, DBPASSWORD);
    $sql="INSERT INTO stanze (Nome,Prezzo,Breve_Descrizione,Descrizione,Numero_Stanze,Numero_Persone,Immagine)
    VALUES('$name',$price,'$short_desc','$desc',$room_num,$person_num,'$nwimage');
    ";
    $res=$conn->query($sql);

    $conn->close();
    print_r($sql);
    header("Location: ../index.php?p=rooms");
}


//FUNCTION UPDATE A ROOM DATA
function updateRoom($name, $price, $short_desc, $desc, $room_num, $person_num, $image, $id)
{
    $sqlim="";
    if (isset($image) &&  $image['size']!==0) {
        $nwimage=genUniq()."_".$image['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], "../../images/". $nwimage);
        $sqlim=",Immagine='$nwimage'";
    }
    $conn=dbconn(DBHOST, DBNAME, DBUSERNAME, DBPASSWORD);
    $sql="UPDATE stanze SET Nome='$name',Breve_Descrizione='$short_desc',
    Descrizione='$desc',Prezzo=$price,
    Numero_Stanze=$room_num,Numero_Persone=$person_num $sqlim
     WHERE id=$id";
    $res=$conn->query($sql);

    $conn->close();
    header("Location: ../index.php?p=rooms");
}

//GET THE INFO OF A SPECIFIC ROOM
function AdmgetRoom($id)
{
    $conn=dbconn(DBHOST, DBNAME, DBUSERNAME, DBPASSWORD);
    $sql="SELECT * FROM stanze WHERE id=$id";
    $res=$conn->query($sql);
    $out=$res->fetch_assoc();

    $conn->close();
    return $out;
}

//DELETE A ROOM USING THE ID AS SEARCH PARAMETER
function delRoom($id)
{
    $conn=dbconn(DBHOST, DBNAME, DBUSERNAME, DBPASSWORD);
    $sql="DELETE FROM stanze WHERE id=$id";
    $res=$conn->query($sql);
    $conn->close();
    return $res;
}

//LIST OF REGISTERED USERS
function getUsers()
{
    $conn=dbconn(DBHOST, DBNAME, DBUSERNAME, DBPASSWORD);
    $sql="SELECT * FROM users";
    $res=$conn->query($sql);

    $out="";
    while ($row = $res->fetch_assoc()) {
        $out.="<tr>
                <td>".$row['Nome']."</td>
                <td>".$row['Cognome']."</td>
                <td>".$row['Username']."</td>
                <td>".$row['Telefono']."</td>
                <td>".$row['Email']."</td>
            </tr>";
    }
    $conn->close();
    return $out;
}




function getStatusList()
{
    $conn=dbconn(DBHOST, DBNAME, DBUSERNAME, DBPASSWORD);

    $sql="SELECT * FROM stato_prenotazione";

    $result=$conn->query($sql);

    $out="";
    while ($row = $result->fetch_assoc()) {
        $out.="<tr>
                <td>".$row['id']."</td>
                <td>".$row['Nome']."</td>
               
            </tr>";
    }
    $conn->close();
    return $out;
}


function getAllStatus()
{
    $conn=dbconn(DBHOST, DBNAME, DBUSERNAME, DBPASSWORD);

    $sql="SELECT * FROM stato_prenotazione order by id";
    $result=$conn->query($sql);
    $out=$result->fetch_all(MYSQLI_ASSOC);

    $conn->close();
    return $out;
}




function getAllReservations()
{
    $conn=dbconn(DBHOST, DBNAME, DBUSERNAME, DBPASSWORD);

    $sql="SELECT * FROM prenotazioni ORDER BY id DESC";

    $result=$conn->query($sql);

    $conn->close();
    return $result->fetch_all(MYSQLI_ASSOC);
}

function AllReservationsList()
{
    $status=getAllStatus();
    $arr=getAllReservations();
    $out="";
    foreach ($arr as $k=>$v) {
        $room_info=getRoom($v['Stanza']);
        $user_info=getUser($v['User']);

        $out=$out."<tr>
<td style='width:15%;'>".$user_info['Nome']." ".$user_info['Cognome']."</td>
<td style='width:10%;'><a href='".getSiteUrl()."/admin/rooms/edit.php?t=edit&id=".$room_info['id']."'>".$room_info['Nome']."</a></td>
<td style='width:5%;'>".$v['Persone']."</td>
<td style='width:10%;'>".$v['Check_In']."</td>
<td style='width:10%;'>".$v['Check_Out']."</td>
<td style='width:10%;'>".$v['Prezzo']."€</td>
<td style='width:20%;'>". getReservationStatus($v['Stato'])['Nome']."</td>
<td style='width:20%;'>
<button type='button' class='btn btn-primary btn-sm btn-action' onclick='openSendEmail(\"".$user_info['Nome']." ".$user_info['Cognome']."\",\"".$v['id']."\")'>Contatta Utente</button>
<button type='button' class='btn btn-danger btn-sm btn-action' onclick='changeStatus(2,\"".$status[2]['Nome']."\",\"".$v['id']."\")'>Annulla Prenotazione</button>
<button type='button' class='btn btn-success btn-sm btn-action' onclick='changeStatus(1,\"".$status[1]['Nome']."\",\"".$v['id']."\")'>Conferma Prenotazione</button>

</td>
</tr>";
    }
    return $out;
}


function changeStatus($reservation, $status)
{
    $conn=dbconn(DBHOST, DBNAME, DBUSERNAME, DBPASSWORD);
    $sql="UPDATE prenotazioni SET Stato=".$status."
     WHERE id=$reservation";
    echo $sql;
    $res=$conn->query($sql);
    $conn->close();
    return $res;
}
