<?php
require_once '../Config/DataBase.php';
require_once '../Login/Cliente.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idCli = $_POST['idCli'];
    $senha = $_POST['senha'];
    $confirmar = $_POST['confirmar'];

    if ($senha !== $confirmar) {
        echo "<script>alert('As senhas não coincidem.'); window.history.back();</script>";
        exit;
    }

    $db = (new Database())->getConnection();
    $Usuario = new Usuario($db);
    $Usuario->id_usu = $idCli;
    $Usuario->senha_usu = $senha;
    $Usuario->comfirmaSenha_usu = $confirmar;

    if ($Usuario->editarSenha()) {
        echo "<script>alert('Senha redefinida com sucesso!'); window.location.href = '../Login/Login.html';</script>";
    } else {
        echo "<script>alert('Erro ao atualizar senha.'); window.history.back();</script>";
    }
}
?>
