<?php
include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");
if ($_SESSION['idadm']) {
    $idUsuario = $_SESSION['idadm'];
    //echo '<p class="text-white">'.$idUsuario.'</p>';
} else {
    session_destroy();
    header('location: index.php?error=404');
}
?>


<!doctype html>
<html lang="pt-br">

<head>
    <title>Fluxo de Caixa</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body id="b" class="temaBranco">
<?php
include_once('navbar.php');
?>

<div class="container-fluid ">
    <div class="row">
        <div class="col-lg-2 col-md-12 col-12 bg-black text-white navLateral ">
            <h3 class="text-center mt-5 mb-4"><?php echo 'Olá ' . $_SESSION['nome'] ?></h3>
            <hr>
            <div class="fs-5 text-center">
                <a class="aNavLateral" href="#" onclick="carregarConteudo('listarPedido')">
                    <div class="mt-2 btnNavLateral">Pedidos</div>
                </a>
                <a class="aNavLateral" href="#" onclick="carregarConteudo('listarCliente')">
                    <div class="mt-2 btnNavLateral">Clientes</div>
                </a>
                <a class="aNavLateral" href="#" onclick="carregarConteudo('listarServico')">
                    <div class="mt-2 btnNavLateral">Serviços</div>
                </a>
                <a class="aNavLateral" href="#" onclick="carregarConteudo('listarAtendente')">
                    <div class="mt-2 btnNavLateral">Atendentes</div>
                </a>
            </div>
        </div>
        <div class="col-lg-10 col-md-12 col-12 ">
            <div class="container">
                <div id="show" name="show">
                    <?php
                    include_once('listarPedido.php');
                    ?>


                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal de cadastro de cliente-->
<div class="modal fade" id="addCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de cliente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="post" name="frmAddCliente" id="frmAddCliente">
                <div class="modal-body">
                    <div>
                        <label for="addNomeCliente" class="label=control">Nome:</label>
                        <input type="text" name="addNomeCliente" id="addNomeCliente" required="required"
                               class="form-control">
                    </div>
                    <div>
                        <label for="addCelularCliente" class="label=control">Celular:</label>
                        <input type="text" name="addCelularCliente" id="addCelularCliente" required="required"
                               class="form-control telefoneBR">
                    </div>
                    <div>
                        <label for="addEmailCliente" class="label=control">Email:</label>
                        <input type="email" name="addEmailCliente" id="addEmailCliente" required="required"
                               class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success" id="btnAddCliente">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Modal de edicao de cliente-->
<div class="modal fade" id="editCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar cliente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" name="frmEditCliente" id="frmEditCliente">
                <div class="modal-body">
                    <input type="hidden" name="idEditCliente" id="idEditCliente">
                    <div>
                        <label for="editNomeCliente" class="label=control">Nome:</label>
                        <input type="text" name="editNomeCliente" id="editNomeCliente" required="required"
                               class="form-control">
                    </div>
                    <div>
                        <label for="editCelularCliente" class="label=control">Celular:</label>
                        <input type="text" name="editCelularCliente" id="editCelularCliente" required="required"
                               class="form-control telefoneBR">
                    </div>
                    <div>
                        <label for="editEmailCliente" class="label=control">Email:</label>
                        <input type="email" name="editEmailCliente" id="editEmailCliente" required="required"
                               class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" id="btnEditCliente">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!--Modal de deletar cliente-->
<div class="modal fade" id="deleteCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar cliente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" name="frmDeleteCliente" id="frmDeleteCliente">
                <div class="modal-body">
                    <input type="hidden" name="idDeleteCliente" id="idDeleteCliente">
                    <div class="alert alert-danger" role="alert">
                        Tem certeza?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-danger" id="btnDeleteCliente">Deletar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal adição de servico-->
<div class="modal fade" id="addServico" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar serviço</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" name="frmAddServico" id="frmAddServico">
                <div class="modal-body">
                    <div>
                        <label for="addNomeServico" class="label-control">Nome do serviço</label>
                        <input type="text" name="addNomeServico" id="addNomeServico" required="required"
                               class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success" id="btnAddServico">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Modal edição de serviço-->
<div class="modal fade" id="editServico" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar serviço</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" name="frmEditServico" id="frmEditServico">
                <div class="modal-body">
                    <input type="hidden" name="idEditServico" id="idEditServico">
                    <div>
                        <label for="editNomeServico" class="label-control">Nome do serviço</label>
                        <input type="text" name="editNomeServico" id="editNomeServico" required="required"
                               class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" id="btnEditServico">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Modal delete Servico-->
<div class="modal fade" id="deleteServico" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar serviço</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" name="frmDeleteServico" id="frmDeleteServico">
                <div class="modal-body">
                    <input type="hidden" name="idDeleteServico" id="idDeleteServico">
                    <div class="alert alert-danger">
                        Tem certeza?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-danger" id="btnDeleteServico">Deletar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Fazer Pedido -->
<div class="modal fade" id="fazerPedido" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Pedido</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" id="frmFazerPedido" name="frmFazerPedido" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 mb-3 text-center">
                            <h4>Cliente</h4>
                            <select id="addCliente" name="addCliente" class="form-select"
                                    aria-label="Default select example">
                                <?php
                                $pessoa = listarTabelaOrdenada('idcliente,nomeCliente', 'cliente', 'nomeCliente', 'ASC');
                                foreach ($pessoa as $cliente) {
                                    $idcliente = $cliente->idcliente;
                                    $nomeC = $cliente->nomeCliente;
                                    ?>
                                    <option value="<?php echo $idcliente; ?>"><?php echo $nomeC; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-6 mb-3 text-center">
                            <h4>Serviço</h4>
                            <select id="addServico" name="addServico" class="form-select"
                                    aria-label="Default select example">
                                <?php
                                $pessoa = listarTabelaOrdenada('idservico,nomeServico', 'servico', 'nomeServico', 'ASC');
                                foreach ($pessoa as $servico) {
                                    $idservico = $servico->idservico;
                                    $nomeS = $servico->nomeServico;
                                    ?>
                                    <option value="<?php echo $idservico; ?>"><?php echo $nomeS; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-6 mb-3 text-center">
                            <h4>Prazo</h4>
                            <div class="row text-center p-0 m-0">
                                <div class="col-6 ">
                                    <input type="date" class="form-control text-center" id="addDataInicio"
                                           name="addDataInicio"
                                           value="<?php echo DATAATUAL ?>">
                                    <label for="dataInicio">Início</label>
                                </div>
                                <div class="col-6 ">
                                    <input type="date" class="form-control text-center" id="addDataFinal"
                                           name="addDataFinal"
                                           value="<?php echo DATAATUAL ?>">
                                    <label for="dataFinal">Final</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-3 text-center">
                            <h4>Valor</h4>
                            <input id="addValor" name="addValor" type="number" step="0.010" min="1"
                                   class="form-control text-center"
                                   placeholder="Digite seu valor">
                        </div>

                        <div class="col-6 mb-3 text-center">
                            <h4>Forma de Pagamento</h4>
                            <label class="mt-2">
                                <input type="radio" name="addTipoPagamento" id="tipoVista">
                                À Vista
                            </label>
                            <label class="mt-2">
                                <input type="radio" name="addTipoPagamento" id="tipoPrazo">
                                A Prazo
                            </label>
                        </div>
                        <div class="col-6 mb-3 text-center">
                            <h4 id='nomeEntrada' style="display: none">Entrada</h4>
                            <input name="entrada" id="entrada" type="number" step="0.010" min="1"
                                   class="form-control text-center"
                                   placeholder="Digite sua entrada" style="display: none">
                            <select name="parcela" id="parcela" class="form-select form-select-sm mt-2"
                                    aria-label="Default select example" style="display: none">
                                <?php
                                $conta12 = 0;
                                while ($conta12 < 12) {
                                    $conta12 = $conta12 + 1;
                                    ?>
                                    <option value="<?php echo $conta12; ?>"><?php echo $conta12 . ' Parcela(s)'; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success" id="btnFazerPedido" name="btnFazerPedido">Concluir
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Editar Pedido -->
<div class="modal fade" id="editPedido" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Pedido</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" id="frmEditPedido" name="frmEditPedido" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 mb-3 text-center">
                            <h4>Cliente</h4>
                            <input type="text" id="idEditPedido" hidden="hidden">
                            <select id="editCliente" name="editCliente" class="form-select"
                                    aria-label="Default select example">
                                <?php

                                $pessoa = listarTabelaOrdenada('idcliente,nomeCliente', 'cliente', 'nomeCliente', 'ASC');
                                foreach ($pessoa as $cliente) {
                                    $idcliente = $cliente->idcliente;
                                    $nomeC = $cliente->nomeCliente;

                                    ?>


                                    <option value="<?php echo $idcliente; ?>"><?php echo $nomeC; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-6 mb-3 text-center">
                            <h4>Serviço</h4>
                            <select id="editServico" name="editServico" class="form-select"
                                    aria-label="Default select example">
                                <?php
                                $pessoa = listarTabelaOrdenada('idservico,nomeServico', 'servico', 'nomeServico', 'ASC');
                                foreach ($pessoa as $servico) {
                                    $idservico = $servico->idservico;
                                    $nomeS = $servico->nomeServico;
                                    ?>
                                    <option value="<?php echo $idservico; ?>"><?php echo $nomeS; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-6 mb-3 text-center">
                            <h4>Prazo</h4>
                            <div class="row text-center p-0 m-0">
                                <div class="col-6 ">
                                    <input type="date" class="form-control text-center" id="editDataInicio"
                                           name="editDataInicio"
                                           value="<?php echo DATAATUAL ?>">
                                    <label for="editDataInicio">Início</label>
                                </div>
                                <div class="col-6 ">
                                    <input type="date" class="form-control text-center" id="editDataFinal"
                                           name="editDataFinal"
                                           value="<?php echo DATAATUAL ?>">
                                    <label for="editDataFinal">Final</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-3 text-center">
                            <h4>Valor</h4>
                            <input id="editValor" name="editValor" type="number" step="0.010" min="1"
                                   class="form-control text-center"
                                   placeholder="Digite seu valor">
                        </div>

                        <div class="col-6 mb-3 text-center">
                            <h4>Forma de Pagamento</h4>
                            <label class="mt-2">
                                <input type="radio" name="editTipoPagamento" id="tipoEditVista">
                                À Vista
                            </label>
                            <label class="mt-2">
                                <input type="radio" name="editTipoPagamento" id="tipoEditPrazo">
                                A Prazo
                            </label>
                        </div>
                        <div class="col-6 mb-3 text-center">
                            <h4 id='nomeEditEntrada' style="display: none">Entrada</h4>
                            <input name="editEntrada" id="editEntrada" type="number" step="0.010" min="1"
                                   class="form-control text-center"
                                   placeholder="Digite sua entrada" style="display: none">
                            <select name="editParcela" id="editParcela" class="form-select form-select-sm mt-2"
                                    aria-label="Default select example" style="display: none">
                                <?php
                                $conta12 = 0;
                                while ($conta12 < 12) {
                                    $conta12 = $conta12 + 1;
                                    ?>
                                    <option value="<?php echo $conta12; ?>"><?php echo $conta12 . ' Parcela(s)'; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" id="btnEditPedido" name="btnEditPedido">Editar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal de deletar Pedido -->
<div class="modal fade" id="deletePedido" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar Pedido</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" id="frmDeletePedido" name="frmDeletePedido">
                <div class="modal-body ">

                    <input type="text" id="idDeletePedido" name="btnDeletePedido" hidden>
                    <div class="alert alert-danger">Tem certeza?</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-danger" id="btnDeletePedido" name="btnDeletePedido">
                        Deletar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal VerMais Pedido -->
<div class="modal fade" id="verMaisPedido" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ver Mais</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" id="frmVerMaisPedido" name="frmVerMaisPedido">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 mb-3 text-center">
                            <h4>Cliente</h4>
                            <input type="text" class="form-control text-center" id="verMaisCliente"
                                   name="verMaisCliente" disabled>
                        </div>
                        <div class="col-6 mb-3 text-center">
                            <h4>Serviço</h4>
                            <input type="text" class="form-control text-center" id="verMaisServico"
                                   name="verMaisServico" disabled>
                        </div>
                        <div class="col-6 mb-3 text-center">
                            <h4>Prazo</h4>
                            <div class="row text-center p-0 m-0">
                                <div class="col-6 ">
                                    <input type="date" class="form-control text-center" id="verMaisDataInicio"
                                           name="verMaisDataInicio" disabled>
                                    <label for="verMaisDataInicio">Início</label>
                                </div>
                                <div class="col-6 ">
                                    <input type="date" class="form-control text-center" id="verMaisDataFinal"
                                           name="verMaisDataFinal" disabled>
                                    <label for="verMaisDataFinal">Final</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-3 text-center">
                            <h4>Valor</h4>
                            <input id="verMaisValor" name="verMaisValor" type="text"
                                   class="form-control text-center" disabled>
                        </div>
                        <div class="col-6 mb-3 text-center">
                            <h4>Tipo de Pagamento</h4>
                            <input id="verMaisTipoPag" name="verMaisTipoPag" type="text"
                                   class="form-control text-center" disabled>
                        </div>
                        <div class="col-6 mb-3 text-center">
                            <h4>Atendente</h4>
                            <input id="verMaisAtendente" name="verMaisAtendente" type="text"
                                   class="form-control text-center" disabled>
                        </div>
                        <div class="col-6 mb-3 text-center">
                            <h4>Entrada</h4>
                            <input name="verMaisentrada" id="verMaisentrada" type="text"
                                   class="form-control text-center"
                                   placeholder="Sem Entrada" disabled>
                        </div>
                        <div class="col-6 mb-3 text-center">
                            <h4>Parcelas</h4>
                            <input type="text" name="verMaisparcela" id="verMaisparcela"
                                   class="form-control text-center"
                                   disabled>

                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal adição de atendente-->
<div class="modal fade" id="addAtendente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar atendente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" name="frmAddAtendente" id="frmAddAtendente">
                <div class="modal-body">
                    <div>
                        <label for="addNomeAtendente" class="label-control">Nome do atendente:</label>
                        <input type="text" name="addNomeAtendente" id="addNomeAtendente" required="required"
                               class="form-control">
                    </div>
                    <div>
                        <label for="addEmailAtendente" class="label-control">Email do atendente:</label>
                        <input type="email" name="addEmailAtendente" id="addEmailAtendente" required="required"
                               class="form-control">
                    </div>
                    <div>
                        <label for="addSenhaAtendente" class="label-control">Senha:</label>
                        <input type="password" name="addSenhaAtendente" id="addSenhaAtendente" required="required"
                               class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success" id="btnAddAtendente">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal edição de atendente-->
<div class="modal fade" id="editAtendente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar atendente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" name="frmEditAtendente" id="frmEditAtendente">
                <div class="modal-body">
                    <input type="hidden" name="idEditAtendente" id="idEditAtendente">
                    <div>
                        <label for="editNomeAtendente" class="label-control">Nome do atendente:</label>
                        <input type="text" name="editNomeAtendente" id="editNomeAtendente" required="required"
                               class="form-control">
                    </div>
                    <div>
                        <label for="editEmailAtendente" class="label-control">Email do atendente:</label>
                        <input type="email" name="editEmailAtendente" id="editEmailAtendente" required="required"
                               class="form-control">
                    </div>
                    <div>
                        <label for="editSenhaAtendente" class="label-control">Senha:</label>
                        <input type="password" name="editSenhaAtendente" id="editSenhaAtendente" required="required"
                               class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" id="btnEditAtendente">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal delete atendente-->
<div class="modal fade" id="deleteAtendente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar atendente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" name="frmDeleteAtendente" id="frmDeleteAtendente">
                <div class="modal-body">
                    <input type="hidden" name="idDeleteAtendente" id="idDeleteAtendente">
                    <div class="alert alert-danger">
                        Tem certeza?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-danger" id="btnDeleteAtendente">Deletar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js"
        integrity="sha512-oJCa6FS2+zO3EitUSj+xeiEN9UTr+AjqlBZO58OPadb2RfqwxHpjTU8ckIC8F4nKvom7iru2s8Jwdo+Z8zm0Vg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.lordicon.com/lordicon.js"></script>
<script src="./js/controle.js"></script>

<script>
    const tipoVista = document.getElementById('tipoVista');
    const tipoPrazo = document.getElementById('tipoPrazo');
    const parcela = document.getElementById('parcela');
    const entrada = document.getElementById('entrada');
    const nomeEntrada = document.getElementById('nomeEntrada');

    tipoPrazo.addEventListener('click', function () {
        parcela.style.display = 'block';
        nomeEntrada.style.display = 'block';
        entrada.style.display = 'block';

    })
    tipoVista.addEventListener('click', function () {
        parcela.style.display = 'none';
        nomeEntrada.style.display = 'none';
        entrada.style.display = 'none';
    })
</script>
</body>

</html>

