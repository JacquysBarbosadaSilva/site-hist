<?php
    include 'conexao.php';
    session_start();

    $id_usuario = $_SESSION['id_usuario'];

    // Verifica se a requisição POST foi feita corretamente
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($id_usuario != '') {
            // Deleta o usuário
            $stmt = $conexao->prepare("DELETE FROM usuarios WHERE id = ?");
            $stmt->bind_param("i", $id_usuario);  // Evita SQL Injection
            if ($stmt->execute()) {
                // Apaga a sessão do usuário após deletar
                session_destroy();  // Deleta a sessão para evitar o acesso do usuário após deletar a conta

                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                echo "<script>
                        document.addEventListener('DOMContentLoaded', function(){
                            Swal.fire({
                                title: 'Usuário deletado com sucesso!',
                                icon: 'warning',
                                confirmButtonText: 'OK'
                            }).then(function() {
                                window.location.href = 'login.php';  // Redireciona para a página de login após a exclusão
                            });
                        });
                    </script>";
            } else {
                echo "Erro ao deletar usuário: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Usuário não encontrado.";
        }
    } else {
        echo "Requisição inválida.";
    }
?>
