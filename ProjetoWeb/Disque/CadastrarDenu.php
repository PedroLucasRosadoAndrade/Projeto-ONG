<?php

require_once '../Config/DataBase.php';
require_once '../Disque/DisqueClas.php';
if ($_POST) {
    $db = (new Database())->getConnection();
    $Denuncia = new Denuncia($db);
    $Denuncia->descricao_den = $_POST['desricao'];
    $Denuncia->tipoAnimal_den = $_POST['tipo'];
    $Denuncia->cidade_den = $_POST['cidade'];
    $Denuncia->situacao_den = $_POST['cituacao'];
    $Denuncia->endereco_den = $_POST['ende'];
    
    if ($Denuncia->criar()) {
        echo "<script>window.location.href = '../HomeCli.html';</script>";
    exit;
    }
}
?>