<?php
include_once("./config/constantes.php");
include_once("./config/conexao.php");
include_once("./func/funcoes.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

echo json_encode($dados);


if (isset($dados) && !empty($dados)) {
    $nome = isset($dados['addNomeServico']) ? addslashes($dados['addNomeServico']) : '';

    $retornoInsert = insert2Item('servico','nomeServico,cadastro',"$nome",DATATIMEATUAL);
    if($retornoInsert > 0){
        echo json_encode(['success' => true, 'message' => 'Serviço cadastrado com sucesso.']);
    }else{
        echo json_encode(['success' => false, 'message' => 'Serviço não cadastrado.']);
    }
}else{
    echo json_encode(['success' => false, 'message' => 'Serviço não encontrado.']);
}