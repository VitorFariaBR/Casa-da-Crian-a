<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
    header("Location: painel.php");
    exit;
}

include 'conect.php';  

$searchResult = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $searchTerm = $_POST['searchTerm'];
    $con = conect::conectar();
    
    $stmt = $con->prepare('SELECT * FROM professor WHERE NOME LIKE :searchTerm OR CPF_PROFESSOR LIKE :searchTerm');
    $stmt->execute([':searchTerm' => '%' . $searchTerm . '%']);
    $searchResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets4/style.css">
    <title>Buscar Professor</title>
</head>

<body>
    <header class="cabecalho">
        <div class="cabecalho-titulo">
            <h1>CASA DA CRIANÇA</h1>
        </div>

        <div class="botoes-acao">
            <button type="button" onclick="location.href = 'painelUsuario.php'">
                <p>Voltar</p>
            </button>
            <button type="button" onclick="location.href = 'login.php'">
                <p>Sair</p>
            </button>
        </div>
    </header>

    <main>
        <div class="lista">
            <h2>Buscar Professor</h2>
        </div>

        <form action="buscarProfessor.php" method="post">
            <input type="text" name="searchTerm" placeholder="Digite o nome ou CPF do professor" required>
            <button type="submit" class="search-button">Buscar</button>
        </form>
        <br>
        <?php if (!empty($searchResult)): ?>
            <div class="lista">
                <h2>Resultados da Busca</h2>
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>CPF</th>
                        <th>NOME</th>
                        <th>Data de Nascimento</th>
                        <th>CIDADE</th>
                        <th>ENDEREÇO</th>
                        <th>BAIRRO</th>
                        <th>TELEFONE</th>
                        <th>AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($searchResult as $professor): ?>
                        <tr>
                            <td><?= $professor['ID_USER']; ?></td>
                            <td><?= $professor['CPF_PROFESSOR']; ?></td>
                            <td><?= $professor['NOME']; ?></td>
                            <td><?= $professor['DATA_NASC']; ?></td>
                            <td><?= $professor['CIDADE']; ?></td>
                            <td><?= $professor['ENDERECO']; ?></td>
                            <td><?= $professor['BAIRRO']; ?></td>
                            <td><?= $professor['TELEFONE']; ?></td>
                            <td>
                                <a href="deleteProfessor.php?ID_USER=<?= $professor['ID_USER']; ?>">
                                    <img src="./foto/lixeira.png" alt="Lixeira">
                                </a>
                                <a href="updateProfessor.php?id=<?= $professor['ID_USER']; ?>">
                                    <img src="./foto/lapis.png" alt="Lápis">
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
            <p>Nenhum resultado encontrado.</p>
        <?php endif; ?>
    </main>
</body>
</html>
