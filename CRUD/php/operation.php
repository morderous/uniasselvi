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
            echo TextNode("success", "Dados cadastrado(s) com sucesso! ");
        }else{
            echo "Erro";
        }

    }else{
        TextNode("error", "Coloque dados na(s) caixa(s) de texto");

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

function TextNode($classname, $msg){
    $element = "<h6 class='$classname'>$msg</h6>";
        echo $element;
        
}

function getData(){
    $sql = "SELECT * FROM tb_cliente";

    $result = mysqli_query($GLOBALS['con'], $sql);

    if (mysqli_num_rows($result)> 0){
        return $result;

    }
}