<?php
    include 'conexao.php';
    session_start();

    $id_usuario = $_SESSION['id_usuario'];

        if ($id_usuario != '') {
            // Deleta o usuário
            $stmt = $conexao->prepare("DELETE FROM usuarios WHERE id = $id_usuario");
            $stmt->execute();
            echo "Usuário deletado com sucesso.";
            header('Location: ../index.php');
        } else {
            echo "Usuário não encontrado.";
        }
?>