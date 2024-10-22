<?php
    include 'conexao.php';

        // Conecta ao banco de dados
        // ...
    
        // Recebe o ID do registro a ser deletado
    
        // Prepara a query SQL para deletar o registro
    $sql = "DELETE FROM usuarios WHERE id";
    
        // Executa a query
    if ($conexao->query($sql) === TRUE) {
        echo "<script>alert('Usuario Deletado com sucesso')</script>";
        header('Location: ../index.php');

    } else {
        echo json_encode(['erro' => 'Erro ao deletar registro']);
    }
    
        // Fecha a conexão com o banco de dados
    $conexao->close();
?>