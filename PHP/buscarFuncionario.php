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
    
    $stmt = $con->prepare('SELECT * FROM aluno WHERE NOME LIKE :searchTerm OR CPF_ALUNO LIKE :searchTerm');
    $stmt->execute([':searchTerm' => '%' . $searchTerm . '%']);
    $searchResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
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
    
    $stmt = $con->prepare('SELECT * FROM secretario WHERE NOME LIKE :searchTerm OR CPF_SECRETARIO LIKE :searchTerm');
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
    <title>Buscar Funcionário</title>
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
            <h2>Buscar Funcionário</h2>
        </div>

        <form action="buscarFuncionario.php" method="post">
            <input type="text" name="searchTerm" placeholder="Digite o nome ou CPF do funcionário" required>
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
                    <?php foreach($searchResult as $funcionario): ?>
                        <tr>
                            <td><?= $funcionario['ID_USER']; ?></td>
                            <td><?= $funcionario['CPF_SECRETARIO']; ?></td>
                            <td><?= $funcionario['NOME']; ?></td>
                            <td><?= $funcionario['DATA_NASC']; ?></td>
                            <td><?= $funcionario['CIDADE']; ?></td>
                            <td><?= $funcionario['ENDERECO']; ?></td>
                            <td><?= $funcionario['BAIRRO']; ?></td>
                            <td><?= $funcionario['TELEFONE']; ?></td>
                            <td>
                                <a href="deleteFuncionario.php?ID_USER=<?= $funcionario['ID_USER']; ?>">
                                    <img src="./foto/lixeira.png" alt="Lixeira">
                                </a>
                                <a href="updateFuncionario.php?id=<?= $funcionario['ID_USER']; ?>">
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

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets4/style.css">
    <title>Buscar Criança</title>
</head>

<body>
    <header class="cabecalho">
        <div class="cabecalho-titulo">
            <h1>CASA DA CRIANÇA</h1>
        </div>

        <div class="botoes-acao">
            <button type="button" onclick="location.href = 'painelCrianca.php'">
                <p>Voltar</p>
            </button>
            <button type="button" onclick="location.href = 'login.php'">
                <p>Sair</p>
            </button>
        </div>
    </header>

    <main>
        <div class="lista">
            <h2>Buscar Criança</h2>
        </div>

        <form action="buscarCrianca.php" method="post">
            <input type="text" name="searchTerm" placeholder="Digite o nome ou CPF da criança" required>
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
                        <th>RA</th>
                        <th>NOME</th>
                        <th>CPF</th>
                        <th>Data de Nascimento</th>
                        <th>CIDADE</th>
                        <th>ENDEREÇO</th>
                        <th>BAIRRO</th>
                        <th>TELEFONE</th>
                        <th>AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($searchResult as $aluno): ?>
                        <tr>
                            <td><?= $aluno['ID_ALUNO']; ?></td>
                            <td><?= $aluno['MATRICULA']; ?></td>
                            <td><?= $aluno['NOME']; ?></td>
                            <td><?= $aluno['CPF_ALUNO']; ?></td>
                            <td><?= $aluno['DATA_NASC']; ?></td>
                            <td><?= $aluno['CIDADE']; ?></td>
                            <td><?= $aluno['ENDERECO_COMPLETO']; ?></td>
                            <td><?= $aluno['BAIRRO']; ?></td>
                            <td><?= $aluno['TELEFONE']; ?></td>
                            <td>
                                <a href="deleteCrianca.php?ID_ALUNO=<?= $aluno['ID_ALUNO']; ?>">
                                    <img src="./foto/lixeira.png" alt="Lixeira">
                                </a>
                                <a href="updateCrianca.php?id=<?= $aluno['ID_ALUNO']; ?>">
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
