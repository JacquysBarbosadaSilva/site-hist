<?php

    include './php/conexao.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title>Históra e Tradição</title>
    </head>
    <body>
        <nav>
            <div class="nav-bar">
                
                <div class="navegacao-paginas">
                    <div class="logo">
                        <a href="./php/login.php">
                            <img class="logo-nav-bar" src="./img/img-logo.png" alt="Logo">
                        </a>
                    </div>
                    <ul>
                        <li><a href="./php/login.php">Home</a></li>
                        <li><a href="./php/login.php">Glossário</a></li>
                    </ul> 
                </div>
                <div class="cadastro-login">
                    <ul id="botoes-caddastrar-login">
                        <li><a href="./php/cadastrar.php" class="button-cadastrar">Cadastrar</a></li>
                        <li><a href="./php/login.php" class="button-login">Login</a></li>
                    </ul>
                </div>
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
        <div class="carousel-item active" style="position: relative;">
            <img id="tamanho_da_imagem" class="d-block w-100" src="./img/archaeological-cave-paintings.jpg" alt="Primeiro Slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>História Primitiva</h5>
            </div>
        </div>

            <div class="carousel-item" style="position: relative;">
                <img id="tamanho_da_imagem" class="d-block w-100" src="./img/historia_antiga.jpg" alt="Segundo Slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>História Antga</h5>
                </div>
            </div>

            <div class="carousel-item" style="position: relative;">
                <img id="tamanho_da_imagem" class="d-block w-100" src="./img/idade_media.jpg" alt="Terceiro Slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Idade Média</h5>
                </div>
            </div>

            <div class="carousel-item" style="position: relative;">
                <img id="tamanho_da_imagem" class="d-block w-100" src="./img/idade_moderna.jpg" alt="Quarto Slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Idade Moderna</h5>
                </div>
            </div>

            <div class="carousel-item" style="position: relative;">
                <img id="tamanho_da_imagem" class="d-block w-100" src="./img/idade_contemporanea.jpg" alt="Quarto Slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Idade Contemporanea</h5>
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
                <a class="titulo-cards" href="php/cadastrar.php">
                    <div class="cards-historia">
                        <h5>História Primitiva</h5>
                        <img class="imagens-dos-cards" src="./img/archaeological-cave-paintings.jpg" alt="">
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a class="titulo-cards" href="php/cadastrar.php">
                    <div class="cards-historia">
                        <h5>História Antiga</h5>
                        <img class="imagens-dos-cards" src="./img/historia_antiga.jpg" alt="">
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a class="titulo-cards" href="php/cadastrar.php">
                    <div class="cards-historia">
                        <h5>Idade Média</h5>
                        <img class="imagens-dos-cards" src="./img/idade_media.jpg" alt="">
                    </div>
                </a>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-12 d-flex justify-content-center">
                <div class="container-80">
                    <div class="row">
                        <div class="col-md-6">
                            <a class="titulo-cards" href="php/cadastrar.php">
                                <div class="cards-historia">
                                    <h5>Idade Moderna</h5>
                                    <img class="imagens-dos-cards" src="./img/idade_moderna.jpg" alt="">
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a class="titulo-cards" href="php/cadastrar.php">
                                <div class="cards-historia">
                                    <h5>Idade Contemporanea</h5>
                                    <img class="imagens-dos-cards" src="./img/idade_contemporanea.jpg" alt="">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>