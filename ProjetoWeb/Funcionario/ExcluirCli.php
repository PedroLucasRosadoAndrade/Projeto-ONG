<?php
require_once '../Config/DataBase.php';
require_once '../Login/Cliente.php';
$db = (new Database())->getConnection();
$Usuario = new Usuario($db);
$Usuario->id_usu = $_GET['idCli'];
if ($Usuario->deletar()) {
     echo "<script>window.location.href = './ConsultarUsuario.php';</script>";
        exit;
}