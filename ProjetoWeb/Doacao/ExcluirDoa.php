<?php
require_once '../Config/DataBase.php';
require_once '../Doacao/DoacaoClas.php';
$db = (new Database())->getConnection();
$Doacao = new doacao($db);
$Doacao->id_doa = $_GET['idDoa'];
if ($Doacao->deletar()) {
     echo "<script>window.location.href = '../Doacao/Doacao.php';</script>";
        exit;
}
?>
