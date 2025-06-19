<?php
require_once '../Config/DataBase.php';
require_once '../Doacao/DoacaoClas.php';

$db = (new Database())->getConnection();
$Doacao = new Doacao($db);
$resultado = $Doacao->listar();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Estilo/Relatorio.css">
  <title>Relatório de Doações</title>
</head>

<body>

  <h1>Relatório de Doações</h1>

  <?php while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) : ?>
    <div class="relatorio-item">
      <p><strong>ID:</strong> <?= htmlspecialchars($row['id_doa']) ?></p>
      <p><strong>Tipo:</strong> <?= htmlspecialchars($row['tipo_doa']) ?></p>
      <p><strong>Nome do Produto:</strong> <?= htmlspecialchars($row['nomeProd_doa']) ?></p>
      <p><strong>Quantidade:</strong> <?= htmlspecialchars($row['quantidade_doa']) ?></p>
    </div>
  <?php endwhile; ?>

  <div class="botao-container">
    <a class="botao-relatorio" href="../Doacao/Doacao.php">Voltar</a>
  </div>

</body>
</html>