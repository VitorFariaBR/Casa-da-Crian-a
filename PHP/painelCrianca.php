<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="assets2/css/Usuario.css";
</head>
<body>
    <header class="cabecalho">
        <div class="cabecalho-titulo">
            <h1>CASA DA CRIANÇA</h1>
        </div>

        <div class="botoes-acao">
            <button type="button" onclick="location.href = 'painel.php'">
                <p>Voltar</p>
            </button>
            <button type="button" onclick="location.href = 'login.php'">
                <p>Sair</p>
            </button>
        </div>
    </header>

    <main>
        <div class="linha"></div>
        <nav class="main-home-navegacao">
            <div class="cabecalho-navegacao">
                <h2>ALUNOS</h2>
            </div>
            <div class="row">
                <button type="button" onclick="location.href = '/Projeto/Casa-da-Crian-a/PHP/createCrianca.php'">
                    <p>Adicionar</p>
                </button>
    
                <button type="button" onclick="location.href = '/Projeto/Casa-da-Crian-a/PHP/listCrianca.php'">
                    <p>Listar Crianças</p>
                </button>

                <button type="button" onclick="location.href = '/Projeto/Casa-da-Crian-a/PHP/updateCrianca.php'">
                    <p>Editar Dados</p>
                </button>
            </div>
        </nav>

        <div class="main-logo-casadacrianca">
            <div class="imagem"><img src="assets/img/LOGO casa da crianca.png" alt="Logo Casa da Criança"></div>
        </div>
    </main>
</body>
</html>