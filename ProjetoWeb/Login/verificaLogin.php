<?php
require_once '../Config/DataBase.php';
require_once '../Login/Cliente.php';
require_once '../Login/Funcionario.php';

$db = (new Database())->getConnection();

// Verifica se o botão "Entrar como Usuário" foi clicado
if (isset($_POST['login_usuario'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $Usuario = new Usuario($db);
    if ($Usuario->verificarLogin($email, $senha)) {
        // Login de usuário bem-sucedido
        header("Location: ../HomeCli.html");
        exit;
    } else {
        echo "Usuário ou senha inválidos!";
    }
}

// Verifica se o botão "Entrar como Funcionário" foi clicado
if (isset($_POST['login_funcionario'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $Funcionario = new Funcionario($db);
    if ($Funcionario->verificarLogin($email, $senha)) {
        // Login de funcionário bem-sucedido
        header("Location: ../HomeFun.html");
        exit;
    } else {
        echo "Funcionário ou senha inválidos!";
    }
}
?>