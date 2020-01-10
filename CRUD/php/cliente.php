<?php

require_once ("db.php");
require_once ("component.php");

$con = Createdb();

//botão create

if (isset($_POST['create'])){
    createData();
}

if (isset($_POST['update'])){
    UpdateData();
}

if (isset($_POST['delete'])){
    deleteRecord();
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

function UpdateData(){
    $id = textboxValue("id_cliente");
    $nome = textboxValue("nome_cliente");
    $cpf = textboxValue("cpf_cliente");
    $email = textboxValue("email_cliente");

    if ($id && $nome && $cpf && $email){
        $sql = "UPDATE tb_cliente SET nome_cliente='$nome', cpf_cliente='$cpf', email_cliente='$email'
                WHERE idtb_cliente='$id'";
        if (mysqli_query($GLOBALS['con'],$sql)){
        TextNode("success","Dados atualizados com sucesso!");
        }else{
            TextNode("error","Nao atualizados!");
        }
    }else{
        TextNode("error","Selecione os dados");
    }
}

function deleteRecord(){
    $id = (int)textboxValue("id_cliente");

    $sql = "DELETE FROM tb_cliente WHERE idtb_cliente='$id'";

    if (mysqli_query($GLOBALS['con'],$sql)){
        TextNode("success","Dados excluidos com sucesso!");
    }else {
        TextNode("error", "Nao excluidos!");
    }
}