<?php

include_once("./config/constantes.php");
include_once("./config/conexao.php");
include_once("./func/funcoes.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//echo json_encode($dados);

if (isset($dados) && !empty($dados)) {
    $idPedido = isset($dados['id']) ? mb_strtoupper($dados['id']) : '';


    $retornoInsert = deletarCadastro('pedido', 'idpedido', $idPedido);
    if ($retornoInsert > 0) {
        echo json_encode(['success' => true, 'message' => "Pedido deletado com sucesso"]);
    } else {
        echo json_encode(['success' => false, 'message' => "Pedido não deletado!"]);
    }
} else {
    echo json_encode((['success' => false, 'message' => 'Pedido não encontrado!']));
}

