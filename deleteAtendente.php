<?php
include_once("./config/constantes.php");
include_once("./config/conexao.php");
include_once("./func/funcoes.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//echo json_encode($dados);


if (isset($dados) && !empty($dados)) {
    $id = isset($dados['idDeleteAtendente']) ? addslashes($dados['idDeleteAtendente']) : 0;


    $retornoDelete = deletarCadastro('adm','idadm',"$id");
    if ($retornoDelete > 0) {
        echo json_encode(['success' => true, 'message' => "Atendente deletado com sucesso"]);
    } else {
        echo json_encode(['success' => false, 'message' => "Atendente não deletado!"]);
    }
}else{
    echo json_encode(['success' => false, 'message' => "Atendente não encontrado!"]);
}