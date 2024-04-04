<?php
//echo 'cliente';

?>

<div class="card mt-3">
    <div class="card-header fs-4 d-flex justify-content-between align-items-center">
        <div><i class="bi bi-person"></i> Clientes</div>
        <button class="btn btn-success btn-sm"
                onclick="abrirModalJsCliente( 'nao','nao', 'nao','nao','nao','nao','nao','nao','<?php echo DATATIMEATUAL ?>','addCliente','A','btnAddCliente','addCliente','addNomeCliente','','frmAddCliente')">
            Cadastrar
        </button>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th scope="col" width="5%">#</th>
                <th scope="col" width="30%">Nome</th>
                <th scope="col" width="15%">Telefone</th>
                <th scope="col" width="30%">Email</th>
                <th scope="col" width="20%">Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $cliente = listarTabela('*', 'cliente');
            $cont = 1;
            foreach ($cliente as $clientes) {
                $id = $clientes->idcliente;
                $nome = $clientes->nomeCliente;
                $telefone = $clientes->contato;
                $email = $clientes->email;
                ?>
                <tr>
                    <th scope="row"><?php echo $cont; ?></th>
                    <td><?php echo $nome; ?></td>
                    <td><?php echo $telefone; ?></td>
                    <td><?php echo $email; ?></td>
                    <td>
                        <!--                    <Button>Alterar</Button>-->
                        <Button class="btn btn-primary btn-sm"
                                onclick="abrirModalJsCliente('<?php echo $id ?>','idEditCliente', '<?php echo $nome; ?>','editNomeCliente','<?php echo $telefone; ?>','editCelularCliente','<?php echo $email; ?>','editEmailCliente','<?php echo DATATIMEATUAL ?>','editCliente','A','btnEditCliente','editCliente','editNomeCliente','','frmEditCliente')">
                            Alterar
                        </Button>
                        <Button class="btn btn-danger btn-sm"
                                onclick="abrirModalJsCliente('<?php echo $id ?>','idDeleteCliente', 'nao','nao','nao','nao','nao','nao','<?php echo DATATIMEATUAL ?>','deleteCliente','A','btnDeleteCliente','deleteCliente','nao','nao','frmDeleteCliente')">
                            Excluir
                        </Button>
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



<!-- Modal -->
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