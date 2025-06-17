<?php
require_once '../Config/DataBase.php';
require_once '../Disque/DisqueClas.php';
$db = (new Database())->getConnection();
$Denuncia = new Denuncia($db);
$resultado = $Denuncia->listar();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Estilo/styles2.css">
  <link rel="stylesheet" href="../Estilo/estilo.css">
  <title>Document</title>
</head>

<body>
  <header class="header">
    <nav>
      <ul class="nav__links" id="nav-links">
        <li><a href="../HomeFun.html">Home</a></li>
        <!-- <li><a href="../ProjetoWeb/Funcionario/ConsultarUsuario.html">Consultar Usuarios</a></li> -->
        <li><a href="ConsultarEve\Consultar.php">Editar eventos</a></li>
        <!-- <li><a href="imagens.html">Sobre</a></li> -->
        <!-- <li><a href="Disque\Acolhimento.php">Consultar Acolhimentos</a></li> -->


      </ul>
      <div class="nav__menu__btn" id="menu-btn">
        <span><i class="ri-menu-line"></i></span>
      </div>
    </nav>


    <div class="header__container">
      <div class="header__content">
        <p></p>
      </div>
    </div>
  </header>

  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="main.js"></script>
  <table>
    <caption>Lista de Acolhimentos</caption>

    <thead>
      <tr>
        <th>ID</th>
        <th>Descrição</th>
        <th>Tipo de Animal</th>
        <th>Cidade</th>
        <th>Situação</th>
        <th>Endereço</th>
      </tr>
    </thead>
    <?php while ($row = $resultado->fetch(PDO::FETCH_ASSOC)): ?>
      <tr>
        <td><?= $row['id_den'] ?></td>
        <td><?= $row['descricao_den'] ?></td>
        <td><?= $row['tipoAnimal_den'] ?></td>
        <td><?= $row['cidade_den'] ?></td>
        <td><?= $row['situacao_den'] ?></td>
        <td><?= $row['endereco_den'] ?></td>
        <!-- <td>
           <a href="AlterarCli.php?idCli=<?= $row['id_usu'] ?>">Editar</a>
          <a href="ExcluirCli.php" onclick="return confirm('Deseja Realmente Excluir?')">Excluir</a> 
        </td> -->
      </tr>
    <?php endwhile; ?>
  </table>

  <div class="botao-container">
    <a class="botao-relatorio" href="../Disque/RelatorioAcolh.php">Gerar Relatório</a>
    <a class="botao-relatorio" href="../HomeFun.html">Voltar</a>
  </div>
</body>

</html>