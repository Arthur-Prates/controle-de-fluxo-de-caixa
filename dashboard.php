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
                <a class="aNavLateral" href="#" onclick="carregarConteudo('listarCliente')">
                    <div class="mt-2 btnNavLateral">Clientes</div>
                </a>
                <a class="aNavLateral" href="#" onclick="carregarConteudo('listarServiço')">
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

<!-- Modal -->
<div class="modal fade" id="fazerPedido" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Pedido</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" id="frmFazerPedido" name="frmFazerPedido">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 mb-3 text-center">
                            <h4>Cliente</h4>
                            <select id="addCliente" name="addCliente" class="form-select" aria-label="Default select example">
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
                            <select id="addServico" name="addServico" class="form-select" aria-label="Default select example">
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
                                    <input type="date" class="form-control text-center" id="addDataInicio" name="addDataInicio"
                                           value="<?php echo DATAATUAL ?>">
                                    <label for="dataInicio">Início</label>
                                </div>
                                <div class="col-6 ">
                                    <input type="date" class="form-control text-center" id="addDataFinal" name="addDataFinal"
                                           value="<?php echo DATAATUAL ?>">
                                    <label for="dataFinal">Final</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-3 text-center">
                            <h4>Valor</h4>
                            <input id="addValor" name="addValor" type="number" step="0.010" min="1" class="form-control text-center"
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
                            <h4 id='nomeEntrada' style="display: none">Entrada</h4 >
                            <input name="entrada" id="entrada" type="number" step="0.010" min="1" class="form-control text-center"
                                   placeholder="Digite sua entrada" style="display: none">
                            <select  name="parcela" id="parcela" class="form-select form-select-sm mt-2" aria-label="Default select example" style="display: none">
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
                    <button type="submit" class="btn btn-primary" id="btnFazerPedido" name="btnFazerPedido">Concluir
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


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

    tipoPrazo.addEventListener('click',function (){
        parcela.style.display='block';
        nomeEntrada.style.display='block';
        entrada.style.display='block';

    })
    tipoVista.addEventListener('click',function (){
        parcela.style.display='none';
        nomeEntrada.style.display='none';
        entrada.style.display='none';
    })
</script>
</body>

</html>

