<?php
    session_start();
    include 'conexao.php'; // Arquivo contendo a conexão com o banco de dados

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Busca o usuário no banco de dados
        $sql = "SELECT * FROM usuarios WHERE nome_user = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();


        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc(); 


            if (password_verify($password, $user['password_user'])) {
                $_SESSION['usuario'] = $user['nome_user'];  
                $_SESSION['id_usuario'] = $user['id'];  
                $_SESSION['tipo'] = $user['type'];

                if ($user['type'] == 'Professor') {
                    header('Location: home_page_logado.php'); 
                } else {
                    header('Location: home_page_logado.php');
                }
                exit;
            } else {
                echo "Senha incorreta!";
            }
        } else {
            echo "<script>alert('Usuário não encontrado! Volte para a página de cadastro.')</script>";
        }

        $stmt->close();
        $conexao->close();
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <title>Login - Históra e Tradição</title>
    </head>
    <body class="body-cadastrar-login">
        
        <div class="form-login">
        
        <div class="lugar-logo">
                    <a href="cadastrar.php"><button class="button-voltar"><img class="imagem-voltar" src="../img/de-volta.png" alt=""></button></a>
                    <img class="logo-cadastrar" src="../img/img-logo.png" alt="">
                    <button class="button-voltar1"></button>
                </div>
            <form class="" action="" method="post">
                
                
                <h1 class="titulo-login">Login</h1>

                <div class="campos-texto">
                    <label class="identificador-campo"  for="username">Usuário:</label>
                    <input class="campos-info" type="text" id="username" name="username" required>
                </div>
                
                <div class="campos-texto">
                    <label class="identificador-campo" for="password">Senha:</label>
                    <input class="campos-info" type="password" id="password" name="password" required>
                </div>
                
                <div class="alinhamento-button">
                    <button class="button-entrar" type="submit">Login</button>
                </div>
                
                
            </form>
        </div>
    </body>
</html>