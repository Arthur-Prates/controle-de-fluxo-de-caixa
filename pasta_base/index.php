<?php
include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");
?>

<!doctype html>
<html lang="pt-br">

<head>
    <title>Title</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="./css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css">
</head>

<body id="b" class="temaBranco">

<nav id="menu-h" class="navbar fixed-top ">
    <div class="row p-0 m-0">
        <div class="col-lg-1 col-md-12 col-sm-12 col-12 navcol p-0 mb-2  mb-sm-2 mb-md-2 mb-lg-0">
            <ul>
                <li><img src="./img/logo.png" alt="" width="50" height="50" style="border-radius: 50%"></li>
            </ul>
        </div>
        <div class="col-lg-9 col-md-12 col-sm-12 col-12 navcol p-0 mb-2  mb-sm-2 mb-md-2 mb-lg-0">

            <div class="row text-center navRow">
                <div class="col-3 navItems">
                    <a class="text-center" href="">NavBar Daora</a>
                </div>
                <div class="col-3 navItems">
                    <a class="text-center" href="">NavBar Daora</a>
                </div>
                <div class="col-3 navItems">
                    <a class="text-center" href="">NavBar Daora</a>
                </div>
                <div class="col-3 navItems ">
                    <a class="text-center" href="">NavBar Daora</a>

                </div>

            </div>

        </div>
        <div class="col-lg-2 col-md-12 col-sm-12 col-12 navcol p-0 mb-2  mb-sm-2 mb-md-2 mb-lg-0">
            <div class="">
                <form class="d-flex" role="search">
                    <input class="form-control me-2 bg-transparent text-white text-light placebranco" type="search"
                           placeholder="Procurar" aria-label="Search">
                    <button class="btn btn-outline-primary me-2" type="submit">Procurar</button>
                </form>
            </div>
            <div class=me-2">
                <button onclick="mudarTema()" class="me-2 btnMudarTema btn btn-outline-warning d-flex"
                        id="btnMudarTema">
                    <span class="mdi mdi-weather-sunny iconMudarTema" id="iconMudarTema"></span>
                </button>
            </div>
        </div>


    </div>


</nav>
<div class="container-fluid mt-5">

</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
<script src="./js/script.js"></script>

</body>

</html>

