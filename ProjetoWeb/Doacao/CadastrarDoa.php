<?php

require_once '../Config/DataBase.php';
require_once '../Doacao/DoacaoClas.php';
if ($_POST) {
    $db = (new Database())->getConnection();
    $Doacao = new doacao($db);
    $Doacao->tipo_doa = $_POST['tipo'];
    $Doacao->nomeProd_doa = $_POST['nomePro'];
    $Doacao->quantidade_doa = $_POST['quantiPro'];
    if ($Doacao->criar()) {
        echo "<script>window.location.href = '../HomeCli.html';</script>";
    exit;
    }
}
?>