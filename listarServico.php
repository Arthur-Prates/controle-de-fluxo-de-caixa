<?php

//echo 'servi';

?>


<div class="card mt-3">
    <div class="card-header fs-4 d-flex justify-content-between align-items-center">
        <div><i class="bi bi-tools"></i> Serviços</div>
        <button class="btn btn-success btn-sm">Cadastrar</button>
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
                    <th scope="row"><?php echo $cont;?></th>
                    <td><?php echo $nome;?></td>
                    <td><?php echo $cadastro?></td>
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

