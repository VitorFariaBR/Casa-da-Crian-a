<?php 
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
    header("Location: painel.php");
    exit;
}

include 'conect.php';

if (isset($_GET['ID_TURMA'])) {
    $idTurma = $_GET['ID_TURMA'];
    $con = conect::conectar();

    try {
        $stmt = $con->prepare('DELETE FROM turma WHERE ID_TURMA = :id');
        $stmt->execute([':id' => $idTurma]);
        
        if ($stmt->rowCount() > 0) {
            header("Location: listTurma.php");
            exit;
        } else {
            echo "Nenhuma turma encontrada com esse ID.";
        }
    } catch (PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
    }
} else {
    echo "Turma não identificada.";
}
?>
