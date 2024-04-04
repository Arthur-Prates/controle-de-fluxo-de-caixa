<?php

include_once("./config/constantes.php");
include_once("./config/conexao.php");
include_once("./func/funcoes.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//echo json_encode($dados);

if (isset($dados) && !empty($dados)) {
    $nome = isset($dados['addNomeCliente']) ? addslashes($dados['addNomeCliente']) : '';
    $celular = isset($dados['addCelularCliente']) ? addslashes($dados['addCelularCliente']) : '';
    $email = isset($dados['addEmailCliente']) ? addslashes($dados['addEmailCliente']) : '';

    $retornoInsert = insert4Item('cliente', 'nomeCliente,contato,email,cadastro', $nome, $celular, $email,DATATIMEATUAL);
    if ($retornoInsert > 0) {
        echo json_encode(['success' => true, 'message' => "Cliente cadastrado com sucesso"]);
    } else {
        echo json_encode(['success' => false, 'message' => "Cliente não cadastrado!"]);
    }
}else{
    echo json_encode(['success' => false, 'message' => "Cliente não encontrado!"]);
}