<?php
function Createdb(){
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "db_loja";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

    return $conn;
}

function CloseCon($conn)
{
    $conn -> close();
}

