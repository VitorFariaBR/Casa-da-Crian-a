<?php 
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
    header("Location: painel.php");
    exit;
}

include 'conect.php';

if (isset($_GET['ID_USER'])) {
    $idProfessor = $_GET['ID_USER'];
    $con = conect::conectar();

    try {
        $stmt = $con->prepare('DELETE FROM professor WHERE ID_USER = :id');
        $stmt->execute([':id' => $idProfessor]);
        
        if ($stmt->rowCount() > 0) {
            header("Location: listProfessor.php");
            exit;
        } else {
            echo "Nenhum professor encontrado com esse ID.";
        }
    } catch (PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
    }
} else {
    echo "Professor não identificado.";
}
?>
