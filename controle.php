<?php

include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");
$controle = filter_input(INPUT_POST, 'controle', FILTER_SANITIZE_STRING);
if (!empty($controle) && isset($controle)) {
    switch ($controle) {
        case 'listarPedido':
            include_once('listarPedido.php');
            break;
        case 'listarCliente':
            include_once('listarCliente.php');
            break;
        case 'listarServico':
            include_once('listarServico.php');
            break;
        case 'listarAtendente':
            include_once('listarAtendente.php');
            break;
        case 'addPedido':
            include_once('addPedido.php');
            break;
        case 'editPedido':
            include_once('editPedido.php');
            break;
        case 'deletePedido':
            include_once('deletePedido.php');
            break;
        case 'addCliente';
            include_once('addCliente.php');
            break;
        case 'editCliente';
            include_once('editCliente.php');
            break;
        case 'deleteCliente';
            include_once('deleteCliente.php');
            break;
        case 'addServico';
            include_once('addServico.php');
            break;
        case 'editServico';
            include_once('editServico.php');
            break;
        case 'deleteServico';
            include_once('deleteServico.php');
            break;
    }

} else {
    ?>
    <div style="display: flex;justify-content: center;align-items: center; min-height: 95vh !important;">
        <h1>Página Vazia, Retorne. </h1><sup>Error 404</sup>
        <img src="./img/vazio.gif" alt="ERROR 404">
    </div>
    <?php
}
