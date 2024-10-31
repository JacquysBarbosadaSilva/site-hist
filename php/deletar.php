<?php
    include 'conexao.php';
    session_start();

    $id_usuario = $_POST['id_usuario'] ?? null;

    if ($id_usuario) {
        // Verifica se o usuário existe antes de deletar
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->execute([$id_usuario]);
        $usuario = $stmt->fetch();

        if ($usuario) {
            // Deleta o usuário
            $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
            $stmt->execute([$id_usuario]);
            echo "Usuário deletado com sucesso.";
        } else {
            echo "Usuário não encontrado.";
        }
    } else {
        echo "ID de usuário inválido.";
    }
?>