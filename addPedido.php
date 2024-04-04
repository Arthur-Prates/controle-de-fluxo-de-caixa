<?php

include_once("./config/constantes.php");
include_once("./config/conexao.php");
include_once("./func/funcoes.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dados) && !empty($dados)) {
    $idCliente = isset($dados['addCliente']) ? mb_strtoupper($dados['addCliente']) : '';
    $idServico = isset($dados['addServico']) ? mb_strtoupper($dados['addServico']) : '';
    $Valor = isset($dados['addValor']) ? mb_strtoupper($dados['addValor']) : '';
    $dataIN = isset($dados['addDataInicio']) ? mb_strtoupper($dados['addDataInicio']) : '';
    $dataEnd = isset($dados['addDataFinal']) ? mb_strtoupper($dados['addDataFinal']) : '';
//    $tipo = isset($dados['addTipoPagamento']) ? mb_strtoupper($dados['addTipoPagamento']) : '';
    $entrada = isset($dados['entrada']) ? mb_strtoupper($dados['entrada']) : 0;
    $parcela = isset($dados['parcela']) ? mb_strtoupper($dados['parcela']) : 0;
    $idadm = $_SESSION['idadm'];

    if ($entrada == '') {
        $tipo = 'Vista';
    } else {
        $tipo = 'Prazo';
    }
    $retornoInsert = insert10Item('pedido', 'idadm, idcliente, idservico, valor, dataInicio, dataFinal, tipoPagamento, numeroParcelas, valorEntrada, cadastro', $idadm, $idCliente, $idServico, $Valor, $dataIN, $dataEnd, $tipo, $parcela, $entrada, DATATIMEATUAL);
    if ($retornoInsert > 0) {
        echo json_encode(['success' => true, 'message' => "Pedido cadastrado com sucesso"]);
    } else {
        echo json_encode(['success' => false, 'message' => "Pedido não cadastrado!"]);
    }
} else {
    echo json_encode((['success' => false, 'message' => 'Pedido não encontrado!']));
}
//
//echo json_encode($dados);