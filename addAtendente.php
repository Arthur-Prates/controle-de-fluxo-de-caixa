<?php
include_once("./config/constantes.php");
include_once("./config/conexao.php");
include_once("./func/funcoes.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//echo json_encode($dados);


if (isset($dados) && !empty($dados)) {
    $nome = isset($dados['addNomeAtendente']) ? addslashes($dados['addNomeAtendente']) : '';
    $email = isset($dados['addEmailAtendente']) ? addslashes($dados['addEmailAtendente']) : '';
    $senha = isset($dados['addSenhaAtendente']) ? addslashes($dados['addSenhaAtendente']) : '';

    $senhaCrip =criarSenhaHash("$senha");

    $retornoInsert = insert4Item('adm', 'nomeAdm,email,senha,cadastro', $nome, $email, $senhaCrip,DATATIMEATUAL);
    if ($retornoInsert > 0) {
        echo json_encode(['success' => true, 'message' => "Atendente cadastrado com sucesso"]);
    } else {
        echo json_encode(['success' => false, 'message' => "Atendente não cadastrado!"]);
    }
}else{
    echo json_encode(['success' => false, 'message' => "Atendente não encontrado!"]);
}