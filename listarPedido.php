<div class="card mt-5">
    <div class="card-header fs-4 d-flex justify-content-between align-items-center">
        <div><i class="bi bi-book"></i> Pedidos</div>
        <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                onclick="abrirModalJsPedido('nao', 'nao', 'nao', 'nao','nao', 'nao','nao', 'nao','nao', 'nao','nao', 'nao','nao', 'nao', 'nao', 'nao', 'nao', 'nao', 'nao', 'fazerPedido','A', 'btnFazerPedido', 'addPedido',  'frmFazerPedido')">
            Fazer Pedido
        </button>
    </div>
    <div class="card-body">
        <table class="table fixed text-center">
            <thead>
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
            $data = listarTabelaInnerJoinQuadruploOrdenada('*', 'pedido', 'adm', 'cliente', 'servico', 'idadm', 'idcliente', 'idservico', 'a.idpedido', 'DESC');
            $contar = 0;

            foreach ($data as $pedido) {
                $idpedido = $pedido->idpedido;
                $nomeCliente = $pedido->nomeCliente;
                $nomeServico = $pedido->nomeServico;
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
                        <Button class="btn btn-primary btn-sm">Alterar</Button>
                        <Button class="btn btn-danger btn-sm">Excluir</Button>
                    </td>
                </tr>

                <?php
            }
            ?>


            </tbody>
        </table>
    </div>
</div>