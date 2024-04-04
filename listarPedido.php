<div class="card mt-5">
    <div class="card-header fs-4 d-flex justify-content-between align-items-center">
        <div><i class="bi bi-book"></i> Pedidos</div>
        <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                onclick="abrirModalJsPedido('nao', 'nao', 'nao', 'nao','nao', 'nao','nao', 'nao','nao', 'nao','nao', 'nao','nao', 'nao', 'nao', 'nao', 'nao', 'nao', 'fazerPedido','A', 'btnFazerPedido', 'addPedido',  'frmFazerPedido')">
            Fazer Pedido
        </button>
    </div>
    <div class="card-body">
        <table class="table fixed text-center">
            <thead>
            <?php
            $data = listarTabelaInnerJoinQuadruploOrdenada('*', 'pedido', 'adm', 'cliente', 'servico', 'idadm', 'idcliente', 'idservico', 'a.idpedido', 'DESC');
            $contar = 0;
            if ($data !== 'Vazio' ) {
            ?>
            <tr>
                <th scope="col" width="5%">#</th>
                <th scope="col" width="30%">Cliente</th>
                <th scope="col" width="15%">Serviço</th>
                <th scope="col" width="30%">Atendente</th>
                <th scope="col" width="20%">Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php



                foreach ($data as $pedido) {
                    $idpedido = $pedido->idpedido;
                    $idadm = $pedido->idadm;
                    $idCliente = $pedido->idcliente;
                    $dataIn = $pedido->dataInicio;
                    $dataEnd = $pedido->dataFinal;
                    $nomeCliente = $pedido->nomeCliente;
                    $nomeServico = $pedido->nomeServico;
                    $numeroParcelas = $pedido->numeroParcelas;
                    $valorEntrada = $pedido->valorEntrada;
                    $atendente = $pedido->nomeAdm;
                    $valor = $pedido->valor;
                    $contar = $contar + 1;
                    ?>

                    <tr>
                        <th scope="row"><?php echo $contar; ?></th>
                        <td><?php echo $nomeCliente; ?></td>
                        <td><?php echo $nomeServico; ?></td>
                        <td><?php echo $atendente; ?></td>
                        <td>

                            <!--                    <Button>Alterar</Button>-->
                            <Button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    onclick="abrirModalJsPedido('<?php echo $idpedido; ?>', 'idEditPedido', '<?php echo $idCliente; ?>', 'editCliente','nao','nao','<?php echo $nomeServico; ?>', 'editServico','<?php echo $valor; ?>', 'editValor','<?php echo $dataIn; ?>', 'editDataInicio','<?php echo $dataEnd; ?>', 'editDataFinal', '<?php echo $valorEntrada; ?>', 'editEntrada', '<?php echo $numeroParcelas; ?>', 'editParcela', 'editPedido','A', 'btnEditPedido', 'editPedido',  'frmEditPedido')">
                                Alterar
                            </Button>
                            <Button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    onclick="abrirModalJsPedido('<?php echo $idpedido; ?>', 'idDeletePedido', 'nao', 'nao','nao', 'nao','nao', 'nao','nao', 'nao','nao', 'nao','nao', 'nao', 'nao', 'nao', 'nao', 'nao', 'deletePedido','A', 'btnDeletePedido', 'deletePedido',  'frmDeletePedido')">
                                Excluir
                            </Button>

                        </td>
                    </tr>

                    <?php
                }
            } else {
                ?>
                <div style="display: flex;justify-content: center;align-items: center; min-height: 95vh !important;">
                    <h1>Página Vazia. </h1>
                    <img src="./img/vazio.gif" alt="">
                </div>
                <?php
            }
            ?>


            </tbody>
        </table>
    </div>
</div>