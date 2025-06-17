<?php
require_once '../ProjetoWeb/Config/DataBase.php';
require_once '../ProjetoWeb/Login/Funcionario.php';
$db = (new Database())->getConnection();
$Funcionario = new Funcionario($db);
// $resultado = $Usuario->listar();
$resultado = $Funcionario-> id_fun = 1;
$resultado = $Funcionario->buscarPorId();
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil/Amigos de Francisco</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./Meuperfil_funcionario.css">
</head>

<body>
    <header class="navbar">
        <div class="nav-links">
            <a href="#" class="nav-button">Home</a>
            <a href="#" class="nav-button">Consultar Usuários</a>
            <a href="#" class="nav-button">Consultar Doações</a>
            <a href="#" class="nav-button">Consultar Acolhimentos</a>
        </div>

        <div class="user-info">
            Funcionário: Roberval Rogerio Clayton
        </div>
    </header>

    <div class="main-layout">

        <main class="content-area profile-main-content">
            <div class="profile-header">
                <div class="profile-avatar-large">RC</div>
                <h2>Roberval Rogerio Clayton</h2>
            </div>

            <section class="profile-details card">
                <h3>Informações Pessoais</h3>
                
                    <div class="info-group">
                        <label for="nome">Nome Completo:</label>
                        <input type="text" id="nome"  value="<?= $resultado['nome_fun']?>" readonly></input>
                    </div>

                     <div class="info-group">
                        <label for="email">E-mail:</label>
                        <input type="email" id="email" value="<?= $resultado['email_fun']?>" readonly>
                    </div>

                    <div class="info-group">
                        <label for="nome">Senha:</label>
                        <input type="text" id="nome" value="<?= $resultado['senha_fun']?>" readonly>
                    </div>

                   

                    <!-- <div class="info-group">
                        <label for="telefone">Telefone:</label>
                        <input type="tel" id="telefone" value="<?= $resultado['nome_fun']?>" readonly>
                    </div> -->

                    <!-- <div class="info-group">
                        <label for="cargo">Endereço:</label>
                        <input type="text" id="cargo" value="Ji-Paraná, Bairro Urupá" readonly>
                    </div>

                    <div class="info-group">
                        <label for="cargo">Cargo:</label>
                        <input type="text" id="cargo" value="Funcionário" readonly>
                    </div> -->

                <button class="edit-button" id="editProfileBtn">Editar Perfil</button>
                <a class="edit-button" href="./HomeFun.html">Voltar</a>
                <button class="save-button" id="saveProfileBtn" style="display: none;">Salvar Alterações</button>
                <button class="cancel-button" id="cancelEditBtn" style="display: none;">Cancelar</button>
            </section>

        </main>
    </div>

    <footer>
        <p>&copy; 2025 Sistema de Acolhimento Animal</p>
    </footer>

    <script src="./Meuperfil_funcionario_script.js"></script>
</body>

</html>