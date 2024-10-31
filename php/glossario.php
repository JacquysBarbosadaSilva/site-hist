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

        <main>
        <form action="processa_conceito.php" method="post" enctype="multipart/form-data">
            <input type="text" name="titulo" placeholder="Título do conceito" required>
            <textarea name="descricao" placeholder="Descrição do conceito" required></textarea>
            <input type="text" name="fonte" placeholder="Fonte de pesquisa" required>
            <input type="file" name="imagem" required>
            <button type="submit" name="acao" value="adicionar">Adicionar Conceito</button>
        </form>
        
        <section id="lista-conceitos">
            <?php
            // Exibir conceitos existentes com opções de editar e excluir
            $stmt = $conn->query("SELECT * FROM conceitos ORDER BY titulo ASC");
            while ($row = $stmt->fetch()) {
                echo "<div class='conceito-admin'>";
                echo "<h2>{$row['titulo']}</h2>";
                echo "<form action='processa_conceito.php' method='post'>";
                echo "<input type='hidden' name='id' value='{$row['id']}'>";
                echo "<button type='submit' name='acao' value='editar'>Editar</button>";
                echo "<button type='submit' name='acao' value='excluir'>Excluir</button>";
                echo "</form>";
                echo "</div>";
            }
            ?>
        </section>
    </main>
    </body>
</html>