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
    <link rel="stylesheet" href="./css/style.css">
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
            <div class="fs-3 text-center">
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
                <div id="show" name="show"></div>

            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
<script src="./js/controle.js"></script>

</body>

</html>

