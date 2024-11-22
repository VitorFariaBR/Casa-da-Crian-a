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
    
    $stmt = $con->prepare('SELECT * FROM turma WHERE CPF_PROFESSOR LIKE :searchTerm');
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
    <title>Buscar Turma</title>
</head>

<body>
    <header class="cabecalho">
        <div class="cabecalho-titulo">
            <h1>CASA DA CRIANÇA</h1>
        </div>

        <div class="botoes-acao">
            <button type="button" onclick="location.href = 'painelTurmas.php'">
                <p>Voltar</p>
            </button>
            <button type="button" onclick="location.href = 'login.php'">
                <p>Sair</p>
            </button>
        </div>
    </header>

    <main>
        <div class="lista">
            <h2>Buscar Turma</h2>
        </div>

        <form action="buscarTurma.php" method="post">
            <input type="text" name="searchTerm" placeholder="Digite o CPF do professor" required>
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
                        <th>CPF</th>
                        <th>ID - Disciplina</th>
                        <th>Quantidade máxima de Alunos</th>
                        <th>Quantidade de Aulas Semanais</th>
                        <th>AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($searchResult as $turma): ?>
                        <tr>
                            <td><?= $turma['CPF_PROFESSOR']; ?></td>
                            <td><?= $turma['ID_DISCIPLINA']; ?></td>
                            <td><?= $turma['QTD_MAX_ALUNOS']; ?></td>
                            <td><?= $turma['QTD_AULAS_SEMANAIS']; ?></td>
                            <td>
                                <a href="deleteTurma.php?ID_TURMA=<?= $turma['ID_TURMA']; ?>">
                                    <img src="./foto/lixeira.png" alt="Lixeira">
                                </a>
                                <a href="updateTurma.php?id=<?= $turma['ID_TURMA']; ?>">
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
