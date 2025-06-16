<?php
require_once '../Config/DataBase.php';
require_once '../Doacao/DoacaoClas.php';
$db = (new Database())->getConnection();
$Doacao = new doacao($db);
$resultado = $Doacao->listar();
?>

<!DOCTYPE html>
<html lang="en">

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
                <li><a href="../HomeCli.html">Home</a></li>
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
    <caption>Lista de Produtos</caption>
    <thead>
      <tr>
        <th>ID</th>
        <th>Tipo</th>
        <th>Nome do Produto</th>
        <th>Quantidade</th>
        <th>Atualizações</th>
      </tr>
    </thead>
    <?php while ($row = $resultado->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?= $row['id_doa'] ?></td>
                <td><?= $row['tipo_doa'] ?></td>
                <td><?= $row['nomeProd_doa'] ?></td>
                <td><?= $row['quantidade_doa'] ?></td>
                <td>
                    <a href="AlterarCli.php?idCli=<?= $row['id_doa'] ?>">Editar</a>
                    <a href="../Doacao/ExcluirDoa.php?idDoa=<?= $row['id_doa'] ?>" onclick="return confirm('Deseja Realmente Excluir?')">Excluir</a>
                </td>
            </tr>
        <?php endwhile; ?>
  </table>

    <div class="botao-container">
        <a class="botao-relatorio" href="../Doacao/RelatorioDoac.php">Gerar Relatório</a>
    </div>
</body>

</html>