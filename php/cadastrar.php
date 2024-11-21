<?php
    session_start();
    include 'conexao.php';

    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = htmlspecialchars(trim($_POST['username']));
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $tipo = 'Aluno';
    
        // Verifica se o usuário já existe
        $sql_check = "SELECT * FROM usuarios WHERE nome_user = ?";
        $stmt_check = $conexao->prepare($sql_check);
        $stmt_check->bind_param("s", $username);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        if ($result_check->num_rows > 0) {

            header('Location: cadastrar.php?error=usuario_existente');
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
            echo "<script>
                    document.addEventListener('DOMContentLoaded', function(){
                        Swal.fire({
                            title: 'O usuário já existe!,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                    });
                </script>";
            exit(); // Para evitar execução a seguir caso o usuário já exista

        } else {
            // Inserir o novo usuário no banco de dados
            $sql = "INSERT INTO usuarios (nome_user, password_user, type) VALUES (?, ?, ?)";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("sss", $username, $password, $tipo);

            if ($stmt->execute()) {
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                echo "<script>
                    document.addEventListener('DOMContentLoaded', function(){
                        Swal.fire({
                            title: 'Usuário cadastrado com sucesso!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                    });
                </script>";

                header('Location: home_page_logado.php');
            }
        }

        
            $stmt_check->close();
            $conexao->close();
        }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <title>Cadastro - Históra e Tradição</title>
    </head>
    <body class="body-cadastrar-login">
        <div class="form-login">
            <div class="lugar-logo">
                <img class="logo-cadastrar" src="../img/img-logo.png" alt="">
            </div>
            
            <form class="'" action="" method="post">
                
                
                <h1 class="titulo-login">Criar uma conta</h1>

                <div class="campos-texto">
                    <label for="username">Usuário:</label>
                    <input placeholder="Digite seu usuário" class="campos-info" type="text" id="username" name="username" required>
                </div>
                
                <div class="campos-texto">
                    <label for="password">Senha:</label>
                    <input placeholder="Digite sua senha" class="campos-info" type="password" id="password" name="password" required>
                </div>
                
                <div class="alinhamento-button">
                    <button class="button-entrar" type="submit">Cadastrar</button>
                </div>
            </form>
            <div id="div-redirecionamento">
                <a id="redirecionamento" href="login.php">Já tem cadastro? Entrar na sua conta</a>
            </div>
        </div>
    </body>
</html>