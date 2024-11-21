<?php
    session_start();
    include 'conexao.php';

    $idUsuario = $_SESSION['id_usuario'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $novoNome = $_POST['username'];
        $novaSenha = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $_SESSION['usuario'] = $novoNome;

        if (empty($novoNome) || empty($novaSenha)) {
            echo "Por favor, preencha todos os campos.";
        }

        $sql = "UPDATE usuarios SET nome_user = ?, password_user = ? WHERE id = $idUsuario";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ss", $novoNome, $novaSenha);

        if ($stmt->execute()) {
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
            echo "<script>
                    document.addEventListener('DOMContentLoaded', function(){
                        Swal.fire({
                            title: 'Usuário atualizado com sucesso!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                    });
                </script>";
        } else {
            echo "Erro ao alterar usuário: " . $stmt->error;
        }

        $stmt->close();
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>        
        <title>Perfil - Históra e Tradição</title>
    </head>
    <body>
        <nav>
            <div class="nav-bar">
                
                <div class="navegacao-paginas">
                    <div class="logo">
                        <a href="./php/login.php">
                            <img class="logo-nav-bar" src="../img/img-logo.png" alt="Logo">
                        </a>
                    </div>
                    <ul>
                        <li><a href="home_page_logado.php">Página Inicial</a></li>
                        <li><a href="glossario.php">Glossário</a></li>
                    </ul> 
                </div>
                <div class="alinhamento-login-finalizado alinhamento-login-finalizado-glossario">
<<<<<<< HEAD
                    <?php
                        if (isset($_SESSION['usuario']) && ($_SESSION['tipo'])) {
                            echo "
                            <div class='login-finalizado-navbar'>
                                <p class='button-login-logado'>Olá, " . $_SESSION['usuario'] . "!</p>
                            </div>";
                        } else {
                            echo "
                            <div class='login-finalizado-navbar'>
                                <p class='button-login-logado'>Olá, " . $_SESSION['usuario'] . "!</p>
                            </div>";
                        }
                    ?>
=======
                <?php
                    if (isset($_SESSION['usuario'])) {
                        echo "<div class='login-finalizado-navbar'>
                            <p class='button-login-logado'> Olá, " . strtoupper($_SESSION['usuario']) . "!</p>
                        </div>";
                    }
                ?>
                    <a href="perfil.php"><img class="perfil-icone" src="../img/icone-perfil.png" alt=""></a>
>>>>>>> f28154769f01a6049ac4dfe86d4d627aaf610bb1
                </div>
            </div>
        </nav>

        <div class="fundo-da-pagina">
            <div class="fundo-form">
                <img class="logo-cadastrar" src="../img/img-logo.png" alt="">
                <h1 class="titulo-login">Perfil</h1>
                

                    
                <div class="centralizacao-formulario">
                    
                    <form class="tamanho-formulario" action="" method="post">
                        <div class="campos-texto">
                            <label class="identificador-campo"  for="username">Usuário:</label>
                            <input class="campos-info" type="text" id="username" name="username" required>
                        </div>
                    
                        <div class="campos-texto">
                            <label class="identificador-campo" for="password">Senha:</label>
                            <input class="campos-info" type="password" id="password" name="password" required>
                        </div>


                        <div class="apenas-button">
                            <form action="" method="post">
                                <button class="button-alterar-deletar" value="<?php echo $usuario['id']; ?>" type="submit">Alterar</button>
                            </form>

                            <form action="deletar.php" method="POST">
                                <button class="button-alterar-deletar" type="submit" name="deletar">Deletar</button>
                            </form>

                            <a class="button-logout" href="logout.php">Logout</a>
                        </div>

                    </form>
                </div>

                
                <div>
                </div>
                
            </div>
        </div>
        <script src="../js/script.js"></script>
    </body>
</html>
