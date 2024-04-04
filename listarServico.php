<?php

//echo 'servi';

?>


<div class="card mt-3">
    <div class="card-header fs-4 d-flex justify-content-between align-items-center">
        <div><i class="bi bi-tools"></i> Serviços</div>
        <button class="btn btn-success btn-sm"
                onclick="abrirModalJsServico('nao', 'nao', 'nao', 'nao', '<?php echo DATATIMEATUAL ?>', 'addServico', 'A', 'btnAddServico', 'addServico', 'addNomeServico', '', 'frmAddServico')">
            Cadastrar
        </button>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th scope="col" width="5%">#</th>
                <th scope="col" width="60%">Nome</th>
                <th scope="col" width="15%">Data de cadastro</th>
                <th scope="col" width="20%">Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $cont = 1;
            $servicos = listarTabela('*', 'servico');
            foreach ($servicos as $servico) {
                $nome = $servico->nomeServico;
                $cadastro = $servico->cadastro;
                ?>
                <tr>
                    <th scope="row"><?php echo $cont; ?></th>
                    <td><?php echo $nome; ?></td>
                    <td><?php echo $cadastro ?></td>
                    <td>
                        <!--<Button>Alterar</Button>-->
                        <Button class="btn btn-primary btn-sm">Alterar</Button>
                        <Button class="btn btn-danger btn-sm">Excluir</Button>
                    </td>
                </tr>
                <?php
                ++$cont;
            }
            ?>

            </tbody>
        </table>
    </div>
</div>


<!-- Modal adição de servico-->
<!--<div class="modal fade" id="addServico" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
<!--    <div class="modal-dialog modal-dialog-centered">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header bg-success text-white">-->
<!--                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar serviço</h1>-->
<!--                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
<!--            </div>-->
<!--            <form action="" method="post" name="frmAddServico" id="frmAddServico">-->
<!--                <div class="modal-body">-->
<!--                    <div>-->
<!--                        <label for="addNomeServico" class="label-control">Nome do serviço</label>-->
<!--                        <input type="text" name="addNomeServico" id="addNomeServico" required="required" class="form-control">-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="modal-footer">-->
<!--                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>-->
<!--                    <button type="button" class="btn btn-success" id="btnAddServico">Cadastrar</button>-->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<div class="modal fade" id="editServico" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar serviço</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" name="frmEditServico" id="frmEditServico">
                <div class="modal-body">
                    <input type="text" name="idEditServico" id="idEditServico">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteServico" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar serviço</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" name="frmDeleteServico" id="frmDeleteServico">
                <div class="modal-body">
                    <input type="text" name="idDeleteServico" id="idDeleteServico">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </div>
            </form>
        </div>
    </div>
</div>