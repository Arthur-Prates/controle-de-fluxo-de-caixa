<?php

include_once("./config/constantes.php");
include_once("./config/conexao.php");
include_once("./func/funcoes.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//echo json_encode($dados);

if (isset($dados) && !empty($dados)) {
    $id = isset($dados['idDeleteCliente']) ? addslashes($dados['idDeleteCliente']) : '';

    $retornoDelete = deletarCadastro('cliente','idcliente',"$id");
    if ($retornoDelete == true) {
        echo json_encode(['success' => true, 'message' => "Cliente deletado com sucesso"]);
    } else {
        echo json_encode(['success' => false, 'message' => "Cliente não deletado!"]);
    }
}else{
    echo json_encode(['success' => false, 'message' => "Cliente não encontrado!"]);
}