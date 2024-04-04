<?php
include_once("./config/constantes.php");
include_once("./config/conexao.php");
include_once("./func/funcoes.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//echo json_encode($dados);


if (isset($dados) && !empty($dados)) {
    $id = isset($dados['idDeleteServico']) ? addslashes($dados['idDeleteServico']) : 0;

    $retornoInsert = deletarCadastro('servico','idservico',$id);
    if($retornoInsert > 0){
        echo json_encode(['success' => true, 'message' => 'Serviço apagado com sucesso.']);
    }else{
        echo json_encode(['success' => false, 'message' => 'Serviço não apagado.']);
    }
}else{
    echo json_encode(['success' => false, 'message' => 'Serviço não encontrado.']);
}
