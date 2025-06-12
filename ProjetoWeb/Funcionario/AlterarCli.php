<!-- <?php
require_once '../Config/DataBase.php';
require_once '../Login/Cliente.php';
$db = (new Database())->getConnection();
$Usuario = new Usuario($db);
$Usuario->id_usu = $_GET['idCli'];
$dados = $Usuario->buscarPorId();
if ($_POST) {
    $Usuario->nome_usu = $_POST['nome'];
    $Usuario->email_usu = $_POST['email'];
    $Usuario->senha_usu = $_POST['senha'];
    $Usuario->comfirmaSenha_usu = $_POST['confirmarSen'];

    if ($Usuario->editar()) {
        echo "<script>window.location.href = './ConsultarUsuario.php';</script>";
        exit;
    }
}
?>


<h2>Editar Cliente</h2>
<form method="POST">
    Nome: <input type="text" name="nome" value="<?= $dados['nome'] ?>" required><br>
    Email: <input type="text" name="emailCli" value="<?= $dados['email'] ?>" required><br>
    Senha: <input type="number" name="senhacli" value="<?= $dados['senha'] ?>" required><br>
    Confirmar Senha: <input type="number" name="confirCli" value="<?= $dados['confirmarSen'] ?>" required><br>

    <button type="submit">Atualizar</button>
</form> -->


<?php 
require_once '../Config/DataBase.php';
require_once '../Login/Cliente.php';

$db = (new Database())->getConnection();
$Usuario = new Usuario($db);

// Verifica se o ID foi passado
if (!isset($_GET['idCli'])) {
    die("ID do cliente não foi informado.");
}

$Usuario->id_usu = $_GET['idCli'];
$dados = $Usuario->buscarPorId();

if ($_POST) {
    $Usuario->nome_usu = $_POST['nome'];
    $Usuario->email_usu = $_POST['email'];
    $Usuario->senha_usu = $_POST['senha'];
    $Usuario->comfirmaSenha_usu = $_POST['confirmarSen'];

    if ($Usuario->editar()) {
        echo "<script>window.location.href = './ConsultarUsuario.php';</script>";
        exit;
    }
}
?>

<h2>Editar Cliente</h2>
<!-- <form method="POST">
    Nome: <input type="text" name="nome" value="<?= $dados['nome'] ?>" required><br>
    Email: <input type="text" name="email" value="<?= $dados['email'] ?>" required><br>
    Senha: <input type="password" name="senha" value="<?= $dados['senha'] ?>" required><br>
    Confirmar Senha: <input type="password" name="confirmarSen" value="<?= $dados['confirmarSen'] ?>" required><br>

    <button type="submit">Atualizar</button>
</form> -->

<form method="POST">
    Nome: <input type="text" name="nome" value="<?= $dados['nome_usu'] ?? '' ?>" required><br>
    Email: <input type="text" name="email" value="<?= $dados['email_usu'] ?? '' ?>" required><br>
    Senha: <input type="password" name="senha" value="<?= $dados['senha_usu'] ?? '' ?>" required><br>
    Confirmar Senha: <input type="password" name="confirmarSen" value="<?= $dados['comfirmaSenha_usu'] ?? '' ?>" required><br>

    <button type="submit">Atualizar</button>
</form>