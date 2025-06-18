<?php
require_once '../Config/DataBase.php';
require_once '../Doacao/DoacaoClas.php';
$db = (new Database())->getConnection();
$Doacao = new doacao($db);
$resultado = $Doacao->listar();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Ícones e estilo -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" />

      <link rel="stylesheet" href="../Estilo/Consulta.css">

  <title>Consultar Doações | Amigos de Francisco</title>
</head>
<body>

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
        <!-- <li><a href="../Meuperfil_funcionario.php">Meu Perfil</a></li> -->
        <li><a href="../Login/sair.php">Sair</a></li>
      </ul>
    </nav>
  </header>

  <main class="main-content">
    <section class="tabela-section">
      <table>
        <caption>Lista de Produtos</caption>
        <thead>
          <tr>
            <th>ID</th>
            <th>Tipo</th>
            <th>Nome do Produto</th>
            <th>Quantidade</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $resultado->fetch(PDO::FETCH_ASSOC)): ?>
          <tr>
            <td><?= $row['id_doa'] ?></td>
            <td><?= $row['tipo_doa'] ?></td>
            <td><?= $row['nomeProd_doa'] ?></td>
            <td><?= $row['quantidade_doa'] ?></td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>

      <div class="botao-container">
        <a class="botao-relatorio" href="../Doacao/RelatorioDoac.php">Gerar Relatório</a>
        <a class="botao-relatorio" href="../HomeFun.html">Voltar</a>
      </div>
    </section>
  </main>

</body>
</html>
