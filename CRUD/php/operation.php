<?php

require_once ("db.php");
require_once ("component.php");

$con = Createdb();

//botão create

if (isset($_POST['create'])){
    createData();
}

function createData(){
    $clientenome = textboxValue("nome_cliente");
    $cpfcliente = textboxValue("cpf_cliente");
    $emailcliente = textboxValue("email_cliente");

    if ($clientenome && $cpfcliente && $emailcliente){

        $sql = "INSERT INTO tb_cliente (nome_cliente, cpf_cliente, email_cliente)
                VALUES ('$clientenome', '$cpfcliente', '$emailcliente')";

        if (mysqli_query($GLOBALS['con'], $sql)){
            echo "Cadastro feito com sucesso!";
        }else{
            echo "Erro";
        }

    }else{
        echo "Falta dados nos campos!";

    }
}

function textboxValue($value){
    $textbox = mysqli_real_escape_string($GLOBALS['con'],trim($_POST[$value]));
    if(empty($textbox)){
        return false;
    }else{
        return $textbox;
    }
}