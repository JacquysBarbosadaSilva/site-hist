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
        $imagem = $_POST['imagem']; // URL da imagem

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
                    <li><a href="glossario.php">Glossário</a></li>
                </ul> 
            </div>
            <div class="alinhamento-login-finalizado alinhamento-login-finalizado-glossario">
                <?php
                if (isset($_SESSION['usuario'])) {
                    echo "<div class='login-finalizado-navbar'>
                            <p class='button-login-logado'>Olá, " . ($_SESSION['tipo'] === 'Aluno' ? 'estudante' : 'professor') . " " . $_SESSION['usuario'] . "!</p>
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
        </div>                                                                                                                                                                                                  
    </div>
    
</body>
</html>
