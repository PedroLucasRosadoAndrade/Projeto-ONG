<?php
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