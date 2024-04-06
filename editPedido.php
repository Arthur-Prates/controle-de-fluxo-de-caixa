<?php

include_once("./config/constantes.php");
include_once("./config/conexao.php");
include_once("./func/funcoes.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//echo json_encode($dados);

if (isset($dados) && !empty($dados)) {
    $idPedido = isset($dados['id']) ? mb_strtoupper($dados['id']) : '';
    $idCliente = isset($dados['editCliente']) ? mb_strtoupper($dados['editCliente']) : '';
    $idServico = isset($dados['editServico']) ? mb_strtoupper($dados['editServico']) : '';
    $Valor = isset($dados['editValor']) ? mb_strtoupper($dados['editValor']) : '';
    $dataIN = isset($dados['editDataInicio']) ? mb_strtoupper($dados['editDataInicio']) : '';
    $dataEnd = isset($dados['editDataFinal']) ? mb_strtoupper($dados['editDataFinal']) : '';
//    $tipo = isset($dados['editTipoPagamento']) ? mb_strtoupper($dados['editTipoPagamento']) : '';
    $entrada = isset($dados['editEntrada']) ? mb_strtoupper($dados['editEntrada']) : 0;
    $parcela = isset($dados['editParcela']) ? mb_strtoupper($dados['editParcela']) : 0;
    $idadm = $_SESSION['idadm'];

    if ($entrada == '') {
        $tipo = 'Vista';
    } else {
        $tipo = 'Prazo';
    }   $retornoInsert =  alterar9Item('pedido', 'idadm', 'idcliente', 'idservico', 'valor', 'dataInicio','dataFinal','tipoPagamento', 'numeroParcelas', 'valorEntrada', $idadm, $idCliente, $idServico, $Valor, $dataIN, $dataEnd, $tipo, $parcela, $entrada, 'idpedido', $idPedido);

    if ($retornoInsert > 0) {
        echo json_encode(['success' => true, 'message' => "Pedido alterado com sucesso"]);
    } else {
        echo json_encode(['success' => false, 'message' => "Pedido não alterado!"]);
    }
} else {
    echo json_encode((['success' => false, 'message' => 'Pedido não encontrado!']));
}

