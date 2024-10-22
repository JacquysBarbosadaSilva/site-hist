<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
        <title>Glossário - Históra e Tradição</title>
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
                        <li><a href="home_page_logado.php">Home</a></li>
                        <li><a href="glossario.php">Glossário</a></li>
                    </ul> 
                </div>
                <div class="alinhamento-login-finalizado alinhamento-login-finalizado-glossario">
                    <?php
                        if (isset($_SESSION['usuario']) && ($_SESSION['tipo'])) {
                            echo "
                            <div class='login-finalizado-navbar'>
                                <p class='button-login-logado'>Olá, estudante " . $_SESSION['usuario'] . "!</p>
                            </div>";
                        } else {
                            echo "
                            <div class='login-finalizado-navbar'>
                                <p class='button-login-logado'>Olá, professor " . $_SESSION['usuario'] . "!</p>
                            </div>";
                        }
                    ?>
                    <a href="perfil.php"><img class="perfil-icone" src="../img/icone-perfil.png" alt=""></a>
                </div>
            </div>
        </nav>
    </body>
</html>