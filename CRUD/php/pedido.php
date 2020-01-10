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
    $codbarras = textboxValue("cod_barras");
    $idproduto = textboxValue("idtb_produto");
    $quantidade = textboxValue("quantidade");
    $idcliente = textboxValue("idtb_cliente");
    $status = textboxValue("status");

    if ($codbarras && $idproduto && $quantidade && $idcliente  && $status){

        $sql = "INSERT INTO tb_pedido (data_pedido, cod_barras, fk_cliente, status) VALUES (now(), $codbarras, $idcliente, $status )";


        if (mysqli_query($GLOBALS['con'], $sql)){
            $sql2 =  "INSERT INTO tb_pedido_produto (fk_pedido, fk_produto, quantidade) VALUES (last_insert_id(), $idproduto, $quantidade )";
            if (mysqli_query($GLOBALS['con'], $sql2)){
                echo TextNode("success", "Dados cadastrado(s) com sucesso! ");
            }
        }else{
            TextNode("error", "Verifique os dados");
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
    $sql = "Select idtb_pedido, data_pedido, cod_barras, fk_produto, tb_pedido_produto.quantidade, idtb_cliente, nome_cliente, status  from (((tb_pedido
inner join tb_cliente on fk_cliente = tb_cliente.idtb_cliente)
inner join tb_pedido_produto on idtb_pedido = fk_pedido )
inner join tb_produto on fk_produto = idtb_produto);";

    $result = mysqli_query($GLOBALS['con'], $sql);

    if (mysqli_num_rows($result)> 0){
        return $result;

    }
}

function UpdateData(){
    $id = textboxValue("idtb_pedido");
    $codbarras = textboxValue("cod_barras");
    $idproduto = textboxValue("idtb_produto");
    $quantidade = textboxValue("quantidade");
    $idcliente = textboxValue("idtb_cliente");
    $status = textboxValue("status");


    if ($id && $codbarras && $quantidade && $idproduto && $idcliente && $status){
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