<?php


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
