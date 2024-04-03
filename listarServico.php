<?php

//echo 'servi';

?>


<div class="card">
    <div class="card-header fs-4 d-flex justify-content-between align-items-center">
        <div><i class="bi bi-person"></i> Serviços</div>
        <button class="btn btn-success btn-sm">Cadastrar</button>
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
            <tr>
                <th scope="row">1</th>
                <td>João Paulo</td>
                <td>(33) 8421-9999</td>
                <td>joao@gmail.com</td>
                <td>
<!--                    <Button>Alterar</Button>-->
                    <Button class="btn btn-primary btn-sm">Alterar</Button>
                    <Button class="btn btn-danger btn-sm">Excluir</Button>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
</div>

