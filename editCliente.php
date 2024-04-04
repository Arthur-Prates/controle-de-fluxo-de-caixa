<?php

include_once("./config/constantes.php");
include_once("./config/conexao.php");
include_once("./func/funcoes.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//echo json_encode($dados);

if (isset($dados) && !empty($dados)) {
    $nome = isset($dados['editNomeCliente']) ? addslashes($dados['editNomeCliente']) : '';
    $celular = isset($dados['editCelularCliente']) ? addslashes($dados['editCelularCliente']) : '';
    $email = isset($dados['editEmailCliente']) ? addslashes($dados['editEmailCliente']) : '';
    $id = isset($dados['idEditCliente']) ? addslashes($dados['idEditCliente']) : '';

    $retornoUpdate = alterar3Item('cliente', 'nomeCliente','contato','email', "$nome", "$celular", "$email",'idcliente',"$id");
    if ($retornoUpdate > 0) {
        echo json_encode(['success' => true, 'message' => "Cliente editado com sucesso"]);
    } else {
        echo json_encode(['success' => false, 'message' => "Cliente não editado!"]);
    }
}else{
    echo json_encode(['success' => false, 'message' => "Cliente não encontrado!"]);
}