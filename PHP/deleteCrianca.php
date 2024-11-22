<?php 
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
    header("Location: painel.php");
    exit;
}

include 'conect.php';

if (isset($_GET['ID_ALUNO'])) {
    $idCrianca = $_GET['ID_ALUNO'];
    $con = conect::conectar();

    try {
        $stmt = $con->prepare('DELETE FROM aluno WHERE ID_ALUNO = :id');
        $stmt->execute([':id' => $idCrianca]);
        
        if ($stmt->rowCount() > 0) {
            header("Location: listCrianca.php");
            exit;
        } else {
            echo "Nenhuma criança encontrada com esse ID.";
        }
    } catch (PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
    }
} else {
    echo "Criança não identificada.";
}
?>
