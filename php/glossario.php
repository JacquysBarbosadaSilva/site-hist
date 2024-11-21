<?php
    session_start();
    include 'conexao.php'; // Arquivo contendo a conexão com o banco de dados

    // Verifica se o usuário está autenticado
    if (!isset($_SESSION['usuario'])) {
        header('Location: login.php');
        exit;
    }

    // Verifica o tipo de usuário
    $isProfessor = $_SESSION['tipo'] === 'Professor';
    $isAluno = $_SESSION['tipo'] === 'Aluno';

    // Adiciona novo conceito (apenas para professores)
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['adicionar']) && $isProfessor) {
        $termo = $_POST['termo'];
        $definicao = $_POST['definicao'];
        $fonte = $_POST['fonte'];

        $sql = "INSERT INTO conceitos (termo, definicao, fonte, imagem) VALUES (?, ?, ?, ?)";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ssss", $termo, $definicao, $fonte, $imagem);
        $stmt->execute();
        $stmt->close();
    }

    // Busca os conceitos históricos
    $sql = "SELECT * FROM conceitos ORDER BY termo ASC";
    $result = $conexao->query($sql);

    // Verifica se foi solicitado visualizar um conceito específico
    $conceito = null;
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM conceitos WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $conceito = $result->fetch_assoc();
        }
    }
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
<body class="body-glossario">
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
                    <li><a href="#">Glossário</a></li>
                </ul> 
            </div>
            <div class="alinhamento-login-finalizado alinhamento-login-finalizado-glossario">
            <?php
                if (isset($_SESSION['usuario'])) {
                    echo "<div class='login-finalizado-navbar'>
                        <p class='button-login-logado'> Olá, " . strtoupper($_SESSION['usuario']) . "!</p>
                    </div>";
                }
            ?>

                <a href="perfil.php"><img class="perfil-icone" src="../img/icone-perfil.png" alt=""></a>
            </div>
        </div>
    </nav>
    <div class="alinhamento-container">
        <div class="container">
            <h1 class="titulo">Glossário de Conceitos Históricos</h1>

            <?php if ($conceito): ?>
                <h2 class="subtitulo"><?= htmlspecialchars($conceito['termo']) ?></h2>
                <p class="definicao"><strong>Definição:</strong> <?= nl2br(htmlspecialchars($conceito['definicao'])) ?></p>
                <p class="fonte"><strong>Fonte:</strong> <?= htmlspecialchars($conceito['fonte']) ?></p>
                <?php if ($conceito['imagem']): ?>
                    <img class="imagem-conceito" src="<?= htmlspecialchars($conceito['imagem']) ?>" alt="<?= htmlspecialchars($conceito['termo']) ?>" style="max-width: 100%;">
                <?php endif; ?>
                <a class="link-voltar" href="glossario.php">Voltar ao Glossário</a>
            <?php else: ?>
                <ul class="lista-conceitos">
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <li class="item-conceito"><a class="link-conceito" href="glossario.php?id=<?= $row['id'] ?>"><?= htmlspecialchars($row['termo']) ?></a></li>
                    <?php endwhile; ?>
                </ul>

                <?php if ($isProfessor): ?>
                    <h2 class="subtitulo">Adicionar Novo Conceito</h2>
                    <form class="form-conceito" method="post" action="">
                        <div class="campo">
                            <label class="label" for="termo">Termo:</label>
                            <input class="input" type="text" id="termo" name="termo" required>
                        </div>
                        <div class="campo">
                            <label class="label" for="definicao">Definição:</label>
                            <textarea class="textarea" id="definicao" name="definicao" required></textarea>
                        </div>
                        <div class="campo">
                            <label class="label" for="fonte">Fonte:</label>
                            <input class="input" type="text" id="fonte" name="fonte" required>
                        </div>
                        <button class="botao" type="submit" name="adicionar">Adicionar Conceito</button>
                    </form>
                <?php else: ?>
                    <p>Aguarde o professor para adicionar novos conceitos!</p>
                <?php endif; ?>
            <?php endif; ?>

            <div class="alinhamento-colunas-glossario">

                <div class="colunas-glossario-1">
                    <div>
                        <div class="divisão">
                            <h3 class="indicador-letras">A</h3>
                            <div class="linha-horizontal"></div>
                        </div>
                        
                        <div class="conteudo-glossario">
                            <p id="p-infor"><strong>Antigo Regime</strong> - Sistema de governo e sociedade hierárquica antes da Revolução Francesa, com poder concentrado na monarquia.</p> <p id="p-infor"></p>
                        </div>
                    </div>

                    <div>
                        <div class="divisão">
                            <h3 class="indicador-letras">B</h3>
                            <div class="linha-horizontal"></div>
                        </div>
                        
                        <div class="conteudo-glossario">
                            <p id="p-infor"><strong>Batalha de Poitiers</strong> - Conflito em 732 em que Carlos Martel, líder dos francos, derrotou os árabes e impediu <strong></strong> expansão muçulmana na Europa. </p> <p id="p-infor"></p>
                            <p id="p-infor"><strong>Bolcheviques</strong> - Grupo revolucionário que, em 1917, estabeleceu o primeiro governo socialista na Rússia. </p>
                            <p id="p-infor"><strong>Burguesia</strong> - Classe social urbana ligada ao comércio, que cresceu com o desenvolvimento econômico. </p>
                        </div>
                    </div>

                    <div>
                        <div class="divisão">
                            <h3 class="indicador-letras">C</h3>
                            <div class="linha-horizontal"></div>
                        </div>
                        
                        <div class="conteudo-glossario">
                            <p id="p-infor"><strong>Capitalismo</strong> - Sistema econômico baseado na propriedade privada e na liberdade de mercado.</p>
                            <p id="p-infor"><strong>Carlos Magno</strong> - Importante rei dos francos e imperador, promoveu a expansão do cristianismo e tentou unificar a Europa, mas seu império fragmentou-se após sua morte. </p>
                            <p id="p-infor"><strong>Colonialismo</strong> - Controle e exploração de territórios estrangeiros por potências europeias.  </p>
                            <p id="p-infor"><strong>Contrarreforma</strong> - Resposta da Igreja Católica para conter o avanço do protestantismo. </p>
                            <p id="p-infor"><strong>Cristianismo</strong> - Religião que teve forte influência na cultura e política da Idade Média, com a Igreja exercendo grande poder sobre a sociedade. </p>
                            <p id="p-infor"><strong>Cruzadas</strong> - Expedições militares organizadas pelos cristãos europeus para reconquistar Jerusalém e outras terras sagradas. </p>
                        </div>
                    </div>

                    <div>
                        <div class="divisão">
                            <h3 class="indicador-letras">D</h3>
                            <div class="linha-horizontal"></div>
                        </div>
                        
                        <div class="conteudo-glossario">
                            <p id="p-infor"><strong>Descobrimento da América</strong> - Chegada de europeus à América em 1492, iniciando a colonização.</p> <p id="p-infor"></p>
                        </div>
                    </div>

                    <div>
                        <div class="divisão">
                            <h3 class="indicador-letras">E</h3>
                            <div class="linha-horizontal"></div>
                        </div>
                        
                        <div class="conteudo-glossario">
                            <p id="p-infor"><strong>Estado-nação</strong> - Governo centralizado em um território com identidade nacional. </p>
                            <p id="p-infor"><strong>Expansão Marítima</strong> - Navegações para explorar e colonizar novas terras, como a América. </p>
                        </div>
                    </div>

                    <div>
                        <div class="divisão">
                            <h3 class="indicador-letras">F</h3>
                            <div class="linha-horizontal"></div>
                        </div>
                        
                        <div class="conteudo-glossario">
                            <p id="p-infor"><strong>Feudalismo</strong> - Sistema medieval de dependência entre senhores e camponeses.</p>
                            <p id="p-infor"><strong>Ferramentas de pedra lascada</strong> - Instrumentos produzidos no Paleolítico, feitos a partir do lascamento de pedras para serem utilizados na sobrevivência.</p>
                            <p id="p-infor"><strong>Francos</strong> - Povo germânico que se estabeleceu na Gália e foi um dos mais influentes na Alta Idade Média. Sob Carlos Magno, consolidaram um vasto império e reforçaram o cristianismo.</p>
                        </div>
                    </div>

                    <div>
                        <div class="divisão">
                            <h3 class="indicador-letras">G</h3>
                            <div class="linha-horizontal"></div>
                        </div>
                        
                        <div class="conteudo-glossario">
                            <p id="p-infor"><strong>Guerra do Peloponeso</strong> - Guerra civil entre atenienses e espartanos que enfraqueceu as pólis gregas, facilitando a conquista por estrangeiros, como os macedônicos. </p>
                            <p id="p-infor"><strong>Guerras Médicas</strong> - Conflito entre gregos e persas. </p>
                        </div>
                    </div>

                    <div>
                        <div class="divisão">
                            <h3 class="indicador-letras">H</h3>
                            <div class="linha-horizontal"></div>
                        </div>
                        
                        <div class="conteudo-glossario">
                            <p id="p-infor"><strong>Hominídeos</strong> - Grupo de primatas do qual fazem parte os ancestrais humanos e algumas espécies extintas, como o homo habilis e o homo erectus. </p>
                            <p id="p-infor"><strong>Homo erectus</strong> -  Espécie de hominídeo do Paleolítico Inferior, conhecida por sua postura ereta e habilidades avançadas de sobrevivência. </p>
                            <p id="p-infor"><strong>Homo habilis</strong> - Espécie de hominídeo que viveu durante o Paleolítico Inferior, reconhecido por desenvolver as primeiras ferramentas de pedra. </p>
                            <p id="p-infor"><strong>Homo sapiens</strong> - Espécie humana atual que evoluiu no final da Pré-História, conhecida por sua complexidade cultural e tecnológica. </p>
                            <p id="p-infor"><strong>Humanismo </strong> - Movimento do Renascimento que valoriza o ser humano e a razão, desafiando dogmas religiosos. </p>
                        </div>
                    </div>

                    <div>
                        <div class="divisão">
                            <h3 class="indicador-letras">I</h3>
                            <div class="linha-horizontal"></div>
                        </div>
                        
                        <div class="conteudo-glossario">
                            <p id="p-infor"><strong>Iluminismo</strong> - Movimento intelectual que valoriza a razão e os direitos individuais.  </p>
                            <p id="p-infor"><strong>Irmãos Graco</strong> - Reformadores romanos que propuseram mudanças em resposta aos conflitos sociais entre patrícios e plebeus. </p>
                        </div>
                    </div>

                    <div>
                        <div class="divisão">
                            <h3 class="indicador-letras">J</h3>
                            <div class="linha-horizontal"></div>
                        </div>
                        
                        <div class="conteudo-glossario">
                            <p id="p-infor"><strong>Aguarde mais informações</strong></p>
                        </div>
                    </div>

                    

                    

                </div>

                <div class="colunas-glossario-2">

                    <div>
                        <div class="divisão">
                            <h3 class="indicador-letras">K</h3>
                            <div class="linha-horizontal"></div>
                        </div>
                        
                        <div class="conteudo-glossario">
                            <p id="p-infor"><strong>Aguarde por mais informações</strong></p>
                        </div>
                    </div>

                    <div>
                        <div class="divisão">
                            <h3 class="indicador-letras">L</h3>
                            <div class="linha-horizontal"></div>
                        </div>
                        
                        <div class="conteudo-glossario">
                            <p id="p-infor"><strong>Laicização</strong> - Processo de separação entre o Estado e a religião. </p>
                        </div>
                    </div>

                    <div>
                        <div class="divisão">
                            <h3 class="indicador-letras">M</h3>
                            <div class="linha-horizontal"></div>
                        </div>
                        
                        <div class="conteudo-glossario">
                            <p id="p-infor"><strong>Estado-nação</strong> - Governo centralizado em um território com identidade nacional. </p>
                            <p id="p-infor"><strong>Expansão Marítima</strong> - Navegações para explorar e colonizar novas terras, como a América. </p>
                        </div>
                    </div>

                    <div>
                        <div class="divisão">
                            <h3 class="indicador-letras">N</h3>
                            <div class="linha-horizontal"></div>
                        </div>
                        
                        <div class="conteudo-glossario">
                            <p id="p-infor"><strong>Neandertal</strong> - Espécie de hominídeo que viveu durante o Paleolítico Médio e se destaca por um estilo de vida mais sofisticado e uso difundido do fogo. </p>
                            <p id="p-infor"><strong>Neolítico</strong> - Última fase da Pré-História, onde se observam inovações como a agricultura e a domesticação de animais, antecedendo o surgimento da escrita </p>
                        </div>
                    </div>

                    <div>
                        <div class="divisão">
                            <h3 class="indicador-letras">O</h3>
                            <div class="linha-horizontal"></div>
                        </div>
                        
                        <div class="conteudo-glossario">
                            <p id="p-infor"><strong>Aguarde por mais informçaões</strong> </p>
                        </div>
                    </div>

                    <div>
                        <div class="divisão">
                            <h3 class="indicador-letras">P</h3>
                            <div class="linha-horizontal"></div>
                        </div>
                        
                        <div class="conteudo-glossario">
                            <p id="p-infor"><strong>Pintura rupestre</strong> - Forma de arte pré-histórica, realizada em paredes de cavernas, surgida no Paleolítico Superior e representando cenas do cotidiano e figuras animais. </p>
                        </div>
                    </div>

                    <div>
                        <div class="divisão">
                            <h3 class="indicador-letras">Q</h3>
                            <div class="linha-horizontal"></div>
                        </div>
                        
                        <div class="conteudo-glossario">
                            <p id="p-infor"><strong>Aguarde por mais informações</strong></p>
                        </div>
                    </div>

                    <div>
                        <div class="divisão">
                            <h3 class="indicador-letras">R</h3>
                            <div class="linha-horizontal"></div>
                        </div>
                        
                        <div class="conteudo-glossario">
                            <p id="p-infor"><strong>Reformas Religiosas</strong>- Mudanças na Igreja Católica, como a Reforma Protestante, que criou novas igrejas. </p>
                            <p id="p-infor"><strong>Renascimento </strong>- Movimento cultural e científico que retomou valores clássicos e impulsionou o progresso nas artes e ciências. </p>
                            <p id="p-infor"><strong>República</strong>- Forma de governo em que o líder é eleito, podendo ser democrática ou autoritária. </p>
                            <p id="p-infor"><strong>Revolução Científica</strong>- Avanços nos métodos científicos e nas descobertas no século XVII. </p>
                            <p id="p-infor"><strong>Revolução Industrial</strong>- Transformação nos métodos de produção, marcada pelo uso de novas tecnologias e aumento da produção. </p>
                            <p id="p-infor"><strong>Românico e Gótico</strong>-  Estilos arquitetônicos e artísticos da Idade Média; o românico predominou na Alta Idade Média, e o gótico, na Baixa Idade Média. </p>
                        </div>
                    </div>

                    <div>
                        <div class="divisão">
                            <h3 class="indicador-letras">S</h3>
                            <div class="linha-horizontal"></div>
                        </div>
                        
                        <div class="conteudo-glossario">
                            <p id="p-infor"><strong>Senhores Feudais</strong>- Nobres que possuíam grandes porções de terra e exerciam controle sobre os camponeses e vassalos em seus territórios. </p>
                            <p id="p-infor"><strong>Socialismo</strong>- Ideologia que busca igualdade e defende a propriedade coletiva dos meios de produção.  </p>
                        </div>
                    </div>

                    <div>
                        <div class="divisão">
                            <h3 class="indicador-letras">T</h3>
                            <div class="linha-horizontal"></div>
                        </div>
                        
                        <div class="conteudo-glossario">
                            <p id="p-infor"><strong>Aguarde por mais informações</strong></p>
                        </div>
                    </div> 

                    <div>
                        <div class="divisão">
                            <h3 class="indicador-letras">U</h3>
                            <div class="linha-horizontal"></div>
                        </div>
                        
                        <div class="conteudo-glossario">
                            <p id="p-infor"><strong>Aguarde por mais informações</strong></p>
                        </div>
                    </div>

                    <div>
                        <div class="divisão">
                            <h3 class="indicador-letras">V</h3>
                            <div class="linha-horizontal"></div>
                        </div>
                        
                        <div class="conteudo-glossario">
                            <p id="p-infor"><strong>Vassalos e Suseranos</strong>- Relação de fidelidade entre nobres, onde o suserano cede terras ao vassalo em troca de lealdade e auxílio militar.</p>
                        </div>
                    </div>

                    <div>
                        <div class="divisão">
                            <h3 class="indicador-letras">W</h3>
                            <div class="linha-horizontal"></div>
                        </div>
                        
                        <div class="conteudo-glossario">
                            <p id="p-infor"><strong>Aguarde por mais informações</strong></p>
                        </div>
                    </div>

                    <div>
                        <div class="divisão">
                            <h3 class="indicador-letras">X</h3>
                            <div class="linha-horizontal"></div>
                        </div>
                        
                        <div class="conteudo-glossario">
                            <p id="p-infor"><strong>Aguarde por mais informações</strong></p>
                        </div>
                    </div>

                    <div>
                        <div class="divisão">
                            <h3 class="indicador-letras">Y</h3>
                            <div class="linha-horizontal"></div>
                        </div>
                        
                        <div class="conteudo-glossario">
                            <p id="p-infor"><strong>Aguarde por mais informações</strong></p>
                        </div>
                    </div>

                    <div>
                        <div class="divisão">
                            <h3 class="indicador-letras">Z</h3>
                            <div class="linha-horizontal"></div>
                        </div>
                        
                        <div class="conteudo-glossario">
                            <p id="p-infor"><strong>Aguarde por mais informações</strong></p>
                        </div>
                    </div>

                </div>

            </div>
        </div>                                                                                                                                                                                                  
    </div>
    
</body>
</html>
