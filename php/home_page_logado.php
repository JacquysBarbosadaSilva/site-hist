<?php
    include 'conexao.php';
    session_start();
    $idUsuario = $_SESSION['id_usuario'];

<<<<<<< HEAD

=======
    
    // Define uma imagem padrão se o usuário não tiver uma imagem
    if (empty($caminhoImagem)) {
        $caminhoImagem = "../img/icone-perfil.png";
    }
>>>>>>> f28154769f01a6049ac4dfe86d4d627aaf610bb1


    // Verifica se o usuário está logado
    if (!isset($_SESSION['usuario']) || !isset($_SESSION['tipo'])) {
        // Redireciona para a página inicial (index.php)
        header('Location: login.php');
        exit;
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title>Home - Históra e Tradição</title>
    </head>
    <body>
            <nav>
                <div class="nav-bar responsividade">
                    
                    <div class="navegacao-paginas">
                        <div class="logo">
                            <a href="home_page_logado.php">
                                <img class="logo-nav-bar" src="../img/img-logo.png" alt="Logo">
                            </a>
                        </div>
                        <ul>
                            <li><a href="home_page_logado.php">Página Inicial</a></li>
                            <li><a href="glossario.php">Glossário</a></li>
                        </ul> 
                    </div>
<<<<<<< HEAD
                    <a href="perfil.php">
                        <div class="alinhamento-login-finalizado">
                            <?php
                                if (isset($_SESSION['usuario']) && ($_SESSION['tipo'])) {
                                    echo "
                                    <div class='login-finalizado-navbar'>
                                        <p class='button-login-logado'>Olá, " . $_SESSION['usuario'] . "!</p>
                                    </div>";
                                }
                            ?>
                        </div>
                    </a>
=======
                    <div class="alinhamento-login-finalizado">
                    <?php
                        if (isset($_SESSION['usuario'])) {
                            echo "<div class='login-finalizado-navbar'>
                                <p class='button-login-logado'> Olá, " . strtoupper($_SESSION['usuario']) . "!</p>
                            </div>";
                        }
                    ?>
                        <a href="perfil.php"><img class="perfil-icone" src="../img/icone-perfil.png" alt=""></a>
                    </div>
>>>>>>> f28154769f01a6049ac4dfe86d4d627aaf610bb1
                </div>
            </nav>

            <div class="alinhamento-carrossel">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                    </ol>
                    <div class="carousel-inner">
            <div class="carousel-item active" >
                <img id="tamanho_da_imagem" class="d-block w-100" src="../img/archaeological-cave-paintings.jpg" alt="Primeiro Slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>História Primitiva</h5>
                </div>
            </div>

                <div class="carousel-item" >
                    <img id="tamanho_da_imagem" class="d-block w-100" src="../img/historia_antiga.jpg" alt="Segundo Slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>História Antiga</h5>
                    </div>
                </div>

                <div class="carousel-item" >
                    <img id="tamanho_da_imagem" class="d-block w-100" src="../img/idade_media.jpg" alt="Terceiro Slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Idade Média</h5>
                    </div>
                </div>

                <div class="carousel-item" >
                    <img id="tamanho_da_imagem" class="d-block w-100" src="../img/idade_moderna.jpg" alt="Quarto Slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Idade Moderna</h5>
                    </div>
                </div>

                <div class="carousel-item" >
                    <img id="tamanho_da_imagem" class="d-block w-100" src="../img/idade_contemporanea.jpg" alt="Quarto Slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Idade Contemporânea</h5>
                    </div>
                </div>
            </div>

            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Próximo</span>
            </a>
                </div>
            </div>

            <div class="container-grid text-center">
            <h1 class="titulo-grid">Qual conteúdo deseja explorar?</h1>
        
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <a class="titulo-cards" href="historia_primitiva.php">
                        <div class="cards-historia">
                            <h5>História Primitiva</h5>
                            <img class="imagens-dos-cards" src="../img/img-card-primitiva.jpg" alt="">
                        </div>
                    </a>
                    
                </div>

                <div class="col-md-3">
                    <a class="titulo-cards" href="historia_antiga.php">
                        <div class="cards-historia">
                            <h5>História Antiga</h5>
                            <img class="imagens-dos-cards" src="../img/img-idade-antiga.jpg" alt="">
                        </div>
                    </a>
                </div>

                <div class="col-md-3">
                    <a class="titulo-cards" href="idade_media.php">
                        <div class="cards-historia">
                            <h5>Idade Média</h5>
                            <img class="imagens-dos-cards" src="../img/idade-media.jpg" alt="">
                        </div>
                    </a>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-3">
                    <a class="titulo-cards" href="historia_antiga.php">
                        <div class="cards-historia">
                            <h5>Idade Moderna</h5>
                            <img class="imagens-dos-cards" src="../img/chegada-europeus-me.jpg" alt="">
                        </div>
                    </a>
                </div>

                <div class="col-md-3">
                    <a class="titulo-cards" href="idade_media.php">
                        <div class="cards-historia">
                            <h5>Idade Contemporanea</h5>
                            <img class="imagens-dos-cards" src="../img/img-card-idade-media.jpg" alt="">
                        </div>
                    </a>
                </div>
            </div>

            
        </div>

        <footer>
            <div class="footer">
                <div class="footer-container">
                    <div class="footer-logo">
                        <img src="../img/img-logo.png" alt="Logo História e Tradição">
                    </div>
            
                    <div class="footer-contact">
                        <h5>Contato</h5>
                        <p >Email: <a id="decoracao-link" href="mailto:victorkoba08@gmail.com">historiaetradicao@gmail.com</a></p>
                        <p>Telefone: (12) 99039-99039</p>
                    </div>
                </div>

                <div class="linha-vertical"></div>

                <div class="footer-container">
                    <div class="footer-social-media">
                        <h5>Contatos</h5>
                        
                        <div class="alinhamento-footer">
                            <img id="redes-sociais-icones" src="./img/icone-linkedin.png" alt="">    

                            <a class="linkedin-decoracao" href="https://www.linkedin.com/in/jacquys-barbosa-da-silva-8498522b7/">Jacquys</a>
                            <a class="linkedin-decoracao" href="https://www.linkedin.com/in/miguel-sales-618486312/">Miguel Sales</a>
                            <a class="linkedin-decoracao" href="https://www.linkedin.com/in/nicole-cafalloni-92a33b248/">Nicole</a>
                            <a class="linkedin-decoracao" href="https://www.linkedin.com/in/victor-koba-8a2960206/">Victor</a>
                        </div>
                        
                        
                    </div>
                </div>

            </div>
            <p class="footer-copyright">&copy; 2024 História e Tradição - Todos os Direitos Reservados</p>
        </footer>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>