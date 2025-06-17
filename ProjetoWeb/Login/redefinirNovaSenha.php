<?php
$idCli = $_GET['idCli'] ?? '';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Nova Senha</title>
  <link rel="stylesheet" href="../Estilo/formulario_cadastrousu.css" />
</head>
<body>
  <div class="form-container">
    <div class="formulario">
      <h1>Nova Senha</h1>
      <form method="POST" action="atualizarSenha.php">
        <input type="hidden" name="idCli" value="<?= htmlspecialchars($idCli) ?>">

        <label for="senha"><h2>Nova Senha:</h2></label>
        <input type="password" name="senha" required><br>

        <label for="confirmar"><h2>Confirmar Senha:</h2></label>
        <input type="password" name="confirmar" required><br>

        <button type="submit" class="btn">Atualizar Senha</button>
      </form>
    </div>
  </div>
</body>
</html>
