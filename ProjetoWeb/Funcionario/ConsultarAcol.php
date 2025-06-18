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
  <link rel="stylesheet" href="../Estilo/consulta.css">
  <title>Document</title>
</head>

<body>
  <header class="header">
    <header class="header">
    <nav class="navbar">
      <div class="nav__logo">
        <a href="#">
          <img src="../assets/logo-color.png" alt="Logo" class="logo-color" />
        </a>
      </div>
      <ul class="nav__links" id="nav-links">
        <li><a href="../ConsultarEve/Consultar.html">Início</a></li>
        <li><a href="../Doacao/Doacao.php">Consultar Doações</a></li>
        <li><a href="../Funcionario/ConsultarAcol.php">Consultar Acolhimentos</a></li>
        
       <!--  <li><a href="../Meuperfil_funcionario.php">Meu perfil</a></li> -->
        <li><a href="../Login/sair.php">Sair</a></li>
      </ul>
    </nav>
  </header>


    <div class="header__container">
      <div class="header__content">
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
      </div>
    </div>
  </header>

 
</body>

</html>