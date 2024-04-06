<?php
include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");
?>

<!doctype html>
<html lang="pt-br">

<head>
    <title>Login</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="./css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Reddit+Mono&display=swap');

        .fonte {
            font-family: "Reddit Mono", monospace;
            font-optical-sizing: auto;
            font-style: normal;
        }
    </style>

</head>

<body class="bodylogin" style="background-size: cover;background-repeat: no-repeat;width: 100%;height: 100%;">
<?php
include_once('navbar.php');
?>
<div class="position-absolute top-50 start-50 translate-middle ">

    <div class="container mt-5 ">
        <h1 class='text-center fonte'>Login</h1>
        <form class="form" id='frmLogin' method="post" action='login.php' name="frmLogin">
            <div class="flex-column fonte">
                <label for="email">Email </label>
            </div>
            <div class="inputForm fonte">
                <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg">
                    <g id="Layer_3" data-name="Layer 3">
                        <path d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z"></path>
                    </g>
                </svg>
                <input type="email" class="input" placeholder="Email" id="email" autofocus>
            </div>

            <div class="flex-column fonte">
                <label for="senha">Senha </label>
            </div>
            <div class="inputForm fonte">
                <svg height="20" viewBox="-64 0 512 512" width="20" xmlns="http://www.w3.org/2000/svg">
                    <path d="m336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0"></path>
                    <path d="m304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0"></path>
                </svg>
                <input type="password" class="input" placeholder="Senha" id="senha">

                <lord-icon
                        src="https://cdn.lordicon.com/vfczflna.json"
                        trigger="hover"
                        stroke="bold"
                        colors="primary:#121331,secondary:#30c9e8"
                        style="width:25px;height:25px;display: none;" id="olhoAberto" onclick="mostrarsenha()">
                </lord-icon>
                <lord-icon
                        src="https://cdn.lordicon.com/vfczflna.json"
                        trigger="hover"
                        stroke="bold"
                        state="hover-cross"
                        colors="primary:#121331,secondary:#30c9e8"
                        style="width:25px;height:25px;display: block;" id="olhoFechado" onclick="mostrarsenha()">
                </lord-icon>

            </div>

            <div class="flex-row fonte">
                <div>
                    <input type="checkbox">
                    <label>Lembrar-me </label>
                </div>
                <span class="span mb-5">Esqueceu sua Senha?</span>
            </div>
            <div class="alert erroBonito p-1 text-center fonte" role="alert" id="alertlog" style="display: none;">
            </div>
            <button class="button-submit fonte" type='button' onclick='fazerLogin()'>Entrar</button>

            </p>
        </form>
    </div>

</div>

<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<script src="/node_modules/@lottiefiles/lottie-player/dist/lottie-player.js"></script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/tgs-player.js"></script>
<script src="/node_modules/@lottiefiles/lottie-player/dist/tgs-player.js"></script>
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

</body>

</html>