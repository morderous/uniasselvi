<?php
function Createdb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_loja";

    $con = mysqli_connect($servername, $username, $password, $dbname);

    if (!$con){
        die("Conexão falhou:" .mysqli_connect_error());
    }
}
