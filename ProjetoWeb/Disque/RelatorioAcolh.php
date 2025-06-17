<?php
require_once '../Config/DataBase.php';
require_once '../Disque/DisqueClas.php';

$db = (new Database())->getConnection();
$Denuncia = new Denuncia($db);
$resultado = $Denuncia->listar();
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
      <p><strong>ID:</strong> <?= htmlspecialchars($row['id_den']) ?></p>
      <p><strong>Descrição:</strong> <?= htmlspecialchars($row['descricao_den']) ?></p>
      <p><strong>Tipo de Animal:</strong> <?= htmlspecialchars($row['tipoAnimal_den']) ?></p>
      <p><strong>Cidade:</strong> <?= htmlspecialchars($row['cidade_den']) ?></p>
      <p><strong>Situação:</strong> <?= htmlspecialchars($row['situacao_den']) ?></p>
      <p><strong>Endereço:</strong> <?= htmlspecialchars($row['endereco_den']) ?></p>
      
      
    </div>
  <?php endwhile; ?>

  <div class="botao-container">
    <a class="botao-relatorio" href="../Funcionario/Doacao.php">Voltar</a>
  </div>

</body>
</html>