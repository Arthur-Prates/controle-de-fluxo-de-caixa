<?php
//echo 'atende';
?>


<div class="card mt-3">
    <div class="card-header fs-4 d-flex justify-content-between align-items-center">
        <div><i class="bi bi-person-badge-fill"></i> Atendentes</div>
        <button class="btn btn-success btn-sm" onclick="abrirModalJsAtendente('nao', 'nao', 'nao', 'nao','nao', 'nao','nao','nao', '<?php echo DATATIMEATUAL?>', 'addAtendente','A', 'btnAddAtendente', 'addAtendente', 'addNomeAtendente', '', 'frmAddAtendente')">Cadastrar</button>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th scope="col" width="5%">#</th>
                <th scope="col" width="40%">Nome</th>
                <th scope="col" width="35%">Email</th>
                <th scope="col" width="20%">Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $cont = 1;
            $atendente = listarTabela('*','adm');
            foreach ($atendente as $adm){
                $id = $adm ->idadm;
                $nome = $adm -> nomeAdm;
                $email = $adm -> email;

                ?>
                <tr>
                    <th scope="row"><?php echo $cont;?></th>
                    <td><?php echo $nome;?></td>
                    <td><?php echo $email;?></td>
                    <td>
                        <!--                    <Button>Alterar</Button>-->
                        <Button class="btn btn-primary btn-sm" onclick="abrirModalJsAtendente('<?php echo $id?>', 'idEditAtendente', '<?php echo $nome;?>', 'editNomeAtendente','<?php echo $email;?>', 'editEmailAtendente','','editSenhaAtendente', '<?php echo DATATIMEATUAL?>', 'editAtendente','A', 'btnEditAtendente', 'editAtendente', 'editNomeAtendente', '', 'frmEditAtendente')">Alterar</Button>
                        <Button class="btn btn-danger btn-sm" onclick="abrirModalJsAtendente('<?php echo $id?>', 'idDeleteAtendente', 'nao', 'nao','nao', 'nao','nao','nao', '<?php echo DATATIMEATUAL?>', 'deleteAtendente','A', 'btnDeleteAtendente', 'deleteAtendente', 'nao', 'nao', 'frmDeleteAtendente')">Excluir</Button>
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

