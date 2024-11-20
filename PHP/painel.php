<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/homeADM.css">
    <title>HOME</title>
</head>
<body>
    <header class="cabecalho">
        <div class="cabecalho-titulo">
            <h1>CASA DA CRIANÇA</h1>
        </div>
    </header>

    <main>
        <nav class="main-home-navegacao">
            <div class="row">
                <button>
                    <p>Lista de Chamada</p>
                </button>
    
                <button type="button" onclick="location.href = 'painelUsuario.php'">
                    <p>Usuário</p>
                </button>
            </div>
            <div class="row">
                <button type="button" onclick="location.href = 'painelCrianca.php'">
                    <p>Alunos</p>
                </button>
    
                <button>
                    <p>Atividades</p>
                </button>
            </div>
            <div class="row">
                <button type="button" onclick="location.href = 'painelTurmas.php'">
                    <p>Turmas</p>
                </button>
            </div>
        </nav>

        <div class="main-logo-casadacrianca">
            <div class="imagem"><img src="assets/img/LOGO casa da crianca.png" alt="Logo Casa da Criança"></div>
        </div>
        <div class="main-background-bola"></div> 
            <button type="button" onclick="location.href = 'login.php'">
                <p>Sair</p>
            </button>
    </main>
</body>
</html>