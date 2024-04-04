<?php
include_once("./config/constantes.php");
include_once("./config/conexao.php");
include_once("./func/funcoes.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//echo json_encode($dados);


if (isset($dados) && !empty($dados)) {
    $nome = isset($dados['editNomeServico']) ? addslashes($dados['editNomeServico']) : '';
    $id = isset($dados['idEditServico']) ? addslashes($dados['idEditServico']) : 0;

    $retornoInsert = alterar1Item('servico','nomeServico',"$nome",'idservico',"$id");
    if($retornoInsert > 0){
        echo json_encode(['success' => true, 'message' => 'Serviço editado com sucesso.']);
    }else{
        echo json_encode(['success' => false, 'message' => 'Serviço não editado.']);
    }
}else{
    echo json_encode(['success' => false, 'message' => 'Serviço não encontrado.']);
}
