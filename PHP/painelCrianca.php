<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/homeADM.css">
    <title>ALUNOS</title>
</head>
<body>
    <header class="cabecalho">
        <div class="cabecalho-titulo">
            <h1>CASA DA CRIANÇA</h1>
        </div>
    </header>

    <br>
    <br>
    <br>
    <header class="cabecalhoAluno">
        <div class="cabecalho-tituloAluno">
            <h5>ALUNOS</h5>
        </div>
    </header>

    <main>
        <nav class="main-home-navegacao">
            <div class="row2">
                <button type="button" onclick="location.href = '/Projeto/Casa-da-Crian-a/PHP/createCrianca.php'">
                    <p>ADICIONAR</p>
                </button>
                <br>
                <button type="button" onclick="location.href = '/Projeto/Casa-da-Crian-a/PHP/listCrianca.php'">
                    <p>LISTA DE ALUNOS</p>
                </button>
                <br>
                <button type="button" onclick="location.href = '/Projeto/Casa-da-Crian-a/PHP/updateCrianca.php'">
                    <p>EDITAR DADOS</p>
                </button>
                <br>                
            </div>
        </nav>

        <div class="main-logo-casadacrianca">
            <div class="imagem"><img src="assets/img/LOGO casa da crianca.png" alt="Logo Casa da Criança"></div>
        </div>
        <button class="botao-sair" type="button" onclick="location.href = 'index.php'"><p>SAIR</p></button>
    </main>
</body>
</html>