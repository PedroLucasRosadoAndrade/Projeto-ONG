<?php
require_once '../Config/DataBase.php';
require_once '../Login/Funcionario.php';
$db = (new Database())->getConnection();
$Funcionario = new Funcionario($db);
$resultado = $Funcionario->listar();
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles.css">
    <link rel="stylesheet" href="../Estilo/estilo.css">
    <title>Document</title>
</head>

<body>
    <header class="header">
        <nav>
            <ul class="nav__links" id="nav-links">
                <li><a href="../HomeFun.html">Home</a></li>
                <!-- <li><a href="../ProjetoWeb/Funcionario/ConsultarUsuario.html">Consultar Usuarios</a></li> -->
                <li><a href="ConsultarEve\Consultar.php">Editar eventos</a></li>
                <!-- <li><a href="imagens.html">Sobre</a></li> -->
                <!-- <li><a href="Disque\Acolhimento.php">Consultar Acolhimentos</a></li> -->


            </ul>
            <div class="nav__menu__btn" id="menu-btn">
                <span><i class="ri-menu-line"></i></span>
            </div>
        </nav>


        <div class="header__container">
            <div class="header__content">
                <p></p>
            </div>
        </div>
    </header>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="main.js"></script>

    <table>
        <caption>Lista de Cadastros</caption>
        <thead>
            <tr>
                <th>Numero</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <?php while ($row = $resultado->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?= $row['id_fun'] ?></td>
                <td><?= $row['nome_fun'] ?></td>
                <td><?= $row['email_fun'] ?></td>
                <td>
                    <a href="ExcluirCli.php"onclick="return confirm('Deseja Realmente Excluir?')">Excluir</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <div class="botao-container">
        <a class="botao-relatorio" href="../Funcionario/RelatorioUsua.php">Gerar Relatório</a>
    </div>
</body>

</html>