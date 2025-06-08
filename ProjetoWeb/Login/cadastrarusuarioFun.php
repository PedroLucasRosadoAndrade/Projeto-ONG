<?php

require_once '/Config/DataBase.php';
require_once '/Login/Funcionario.php';
if ($_POST) {
    $db = (new Database())->getConnection();
    $Funcionario = new funcionario($db);
    $Funcionario->nome_fun = $_POST['nome'];
    $Funcionario->email_fun = $_POST['email'];
    $Funcionario->senha_fun = $_POST['senha'];
    $Funcionario->comfirmaSenha_fun = $_POST['confirmarSen'];
    if ($Funcionario->criar()) {
        header("Location: listar.php");
    }
}
?>
