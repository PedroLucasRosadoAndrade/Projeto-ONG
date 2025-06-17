<?php
require_once '../Config/DataBase.php';
require_once '../Login/Cliente.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    $db = (new Database())->getConnection();
    $Usuario = new Usuario($db);

    // Consulta para buscar usuário por e-mail
    $query = "SELECT id_usu FROM Usuario WHERE email_usu = :email";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $usuario['id_usu'];

        // Redireciona para o formulário de redefinição com o ID
        header("Location: redefinirNovaSenha.php?idCli=" . $id);
        exit;
    } else {
        echo "<script>alert('Email não encontrado!'); window.history.back();</script>";
    }
}
?>
