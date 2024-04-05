<?php
include_once("./config/constantes.php");
include_once("./config/conexao.php");
include_once("./func/funcoes.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//echo json_encode($dados);


if (isset($dados) && !empty($dados)) {
    $nome = isset($dados['editNomeAtendente']) ? addslashes($dados['editNomeAtendente']) : '';
    $email = isset($dados['editEmailAtendente']) ? addslashes($dados['editEmailAtendente']) : '';
    $senha = isset($dados['editSenhaAtendente']) ? addslashes($dados['editSenhaAtendente']) : '';
    $id = isset($dados['idEditAtendente']) ? addslashes($dados['idEditAtendente']) : '';


    $senhaCrip =criarSenhaHash("$senha");

    $retornoUpdate = alterar3Item('adm', 'nomeAdm','email','senha', "$nome","$email", "$senhaCrip",'idadm',"$id");
    if ($retornoUpdate > 0) {
        echo json_encode(['success' => true, 'message' => "Atendente alterado com sucesso"]);
    } else {
        echo json_encode(['success' => false, 'message' => "Atendente não alterado!"]);
    }
}else{
    echo json_encode(['success' => false, 'message' => "Atendente não encontrado!"]);
}