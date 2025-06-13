<?php
require_once '../Config/DataBase.php';
require_once '../Login/Cliente.php';

$db = (new Database())->getConnection();
$Usuario = new Usuario($db);
$resultado = $Usuario->listar();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Estilo/Relatorio.css">
  <title>Relatório de Usuários</title>
</head>

<body>

  <h1>Relatório de Usuários</h1>

  <?php while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) : ?>
    <div class="relatorio-item">
      <p><strong>ID:</strong> <?= htmlspecialchars($row['id_usu']) ?></p>
      <p><strong>Nome:</strong> <?= htmlspecialchars($row['nome_usu']) ?></p>
      <p><strong>Email:</strong> <?= htmlspecialchars($row['email_usu']) ?></p>
      <p><strong>Senha:</strong> <?= htmlspecialchars($row['senha_usu']) ?></p>
      <!-- <p><strong>Confirma Senha:</strong> <?= htmlspecialchars($row['comfirmaSenha_usu']) ?></p> -->
    </div>
  <?php endwhile; ?>

  <div class="botao-container">
    <a class="botao-relatorio" href="../Funcionario/ConsultarUsuario.php">Voltar</a>
  </div>

</body>
</html>
