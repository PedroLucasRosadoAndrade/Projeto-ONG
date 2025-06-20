<?php

require_once '../Config/DataBase.php';
require_once '../Login/Cliente.php';
if ($_POST) {
    $db = (new Database())->getConnection();
    $Usuario = new usuario($db);
    $Usuario->nome_usu = $_POST['nome'];
    $Usuario->email_usu = $_POST['email'];
    $Usuario->senha_usu = $_POST['senha'];
    $Usuario->comfirmaSenha_usu = $_POST['confirmarSen'];
    if ($Usuario->criar()) {
        echo "<script>window.location.href = '../Login/Login.html';</script>";
    exit;
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="../Estilo/formulario_cadastrousu.css" />
  <title>Cadastro | Amigos de Francisco</title>
</head>


<body>
  <header class="header">
    <nav>
      <div class="nav__logo">
        <a href="#">
          <img src="../assets/logo-white.png" alt="logo" class="logo-color" />
        </a>
      </div>

      <ul class="nav__links" id="nav-links">
        <li><a href="#"><a href="../index.html">Início</a></a></li>
        <li><a href="#"><a href="../Login/Login.html">Login</a></a></li>
      </ul>
      <div class="nav__menu__btn" id="menu-btn">
        <span><i class="ri-menu-line"></i></span>
      </div>
    </nav>

    <div class="header__content">
      <div class="form-container">
        <div class="formulario">

          <br>
          <h1>Cadastre-se</h1> <br>

          <form method="POST" action="cadastrarUsuarioCli.php">
            <div class="form-group">
              <label for="nome">
                <h2>Nome:</h2>
              </label>
              <input type="text" id="nome" name="nome" required><br>

              <label for="email">
                <h2>Email:</h2>
              </label>
              <input type="email" id="email" name="email" required>

              <label for="senha">
                <h2>Senha:</h2>
              </label>
              <input type="password" id="senha" name="senha" required>

              <label for="confirmarSen">
                <h2>Confirme sua senha:</h2>
              </label>
              <input type="password" id="confirmarSen" name="confirmarSen" required>

            </div> <br>


                        <button type="submit" class="btn">Entrar</button>
          </form>
        </div>
      </div>
    </div>
</body>

</html>
