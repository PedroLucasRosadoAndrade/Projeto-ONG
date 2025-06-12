<?php

require_once '../Config/DataBase.php';
require_once '../Login/Cliente.php';
if ($_POST) {
    $db = (new Database())->getConnection();
    $Usuario = new usuario($db);
    $Usuario->nome_usu = $_POST['nome'];
    $Usuario->email_usu = $_POST['email'];
    $Usuario->senha_usu = $_POST['senha'];
    $Usuario->comfirmaSenha_usu = $_POST['confirmarSen'];
    if ($Usuario->criar()) {
        echo "<script>window.location.href = '../HomeCli.html';</script>";
    exit;
    }
}
?>
