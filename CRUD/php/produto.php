<?php

require_once ("db.php");
require_once ("component.php");

$con = Createdb();

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
    $nomeproduto = textboxValue("nome_produto");
    $valor = textboxValue("valor_unitario_produto");
    $quantidade = textboxValue("quantidade");

    if ($nomeproduto && $valor && $quantidade){

        $sql = "INSERT INTO tb_produto (nome_produto, valor_unitario_produto, quantidade)
                VALUES ('$nomeproduto', '$valor', '$quantidade')";

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
    $sql = "SELECT * FROM tb_produto";

    $result = mysqli_query($GLOBALS['con'], $sql);

    if (mysqli_num_rows($result)> 0){
        return $result;

    }
}

function UpdateData(){
    $id = textboxValue("idtb_produto");
    $nome = textboxValue("nome_produto");
    $valorunitario = textboxValue("valor_unitario_produto");
    $quantidade = textboxValue("quantidade");

    if ($id && $nome && $valorunitario && $quantidade){
        $sql = "UPDATE tb_produto SET nome_produto='$nome', valor_unitario_produto='$valorunitario', quantidade='$quantidade'
                WHERE idtb_produto='$id'";
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
    $id = (int)textboxValue("idtb_produto");

    $sql = "DELETE FROM tb_produto WHERE idtb_produto='$id'";

    if (mysqli_query($GLOBALS['con'],$sql)){
        TextNode("success","Dados excluidos com sucesso!");
    }else {
        TextNode("error", "Nao excluidos!");
    }
}