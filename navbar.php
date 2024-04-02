

<nav class="navbar navbar-expand-lg bg-black text-white">
  <div class="container-fluid text-white">
    <a class="navbar-brand text-white" href="#"><img src="./img/logo.png" alt="" class='img-fluid' width='50'></a>
    <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon text-white"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-light">
        <li class="nav-item text-light">
        <?php
                    if (isset($_SESSION['idadm']) && !empty($_SESSION['idadm'])) {
                        ?>

                        <a class="nav-link active text-white" aria-current="page" href="#"
                           onclick="redireciona('dashboard')">Início</a>
                        <?php
                    }
                    ?>
          
        </li>

      </ul>
      <?php
            if (isset($_SESSION['idadm']) && !empty($_SESSION['idadm'])) {
                ?>
                <a href="./logout.php" class="btn btn-outline-light" type="submit">Sair</a>
                <?php
            }
            ?>
    </div>
  </div>
</nav>