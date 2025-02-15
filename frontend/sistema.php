<?php
include '../backend/conexao.php';
$stmt = $pdo->query("SELECT * FROM campanhas ORDER BY data_criacao DESC");
$campanhas = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../src/styles/caixinha.css">
    <link rel="stylesheet" href="../src/styles/principal.css">
    <title>Financiencia</title>
    <style>
        body {
            background-color: #fff9ea;
            color: white;
            text-align: center;
        }

        .image-box img {
            width: 200px; /* Defina a largura desejada */
            height: auto; /* Mantém a proporção da imagem */
        }
    </style>
    <script>
       
        function showSection(cardId, sectionId) {
            document.querySelectorAll(`#${cardId} .container`).forEach(section => {
                section.classList.add('hidden');
            });
            document.querySelector(`#${cardId} #${sectionId}`).classList.remove('hidden');
        }
    </script>
</head>
<body>
  <header>
    <nav id="navbar"> 
        <i class="fa-solid fa-rocket" id="nav_logo">Financiencia</i>
        <ul id="nav_list">
            <div class="searchBox">
                <input class="searchInput" type="text" name="" placeholder="Search something">
                <button class="searchButton" href="#">     
                    <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29" fill="none">
                        <g clip-path="url(#clip0_2_17)">
                            <g filter="url(#filter0_d_2_17)">
                                <path d="M23.7953 23.9182L19.0585 19.1814M19.0585 19.1814C19.8188 18.4211 20.4219 17.5185 20.8333 16.5251C21.2448 15.5318 21.4566 14.4671 21.4566 13.3919C21.4566 12.3167 21.2448 11.252 20.8333 10.2587C20.4219 9.2653 19.8188 8.36271 19.0585 7.60242C18.2982 6.84214 17.3956 6.23905 16.4022 5.82759C15.4089 5.41612 14.3442 5.20435 13.269 5.20435C12.1938 5.20435 11.1291 5.41612 10.1358 5.82759C9.1424 6.23905 8.23981 6.84214 7.47953 7.60242C5.94407 9.13789 5.08145 11.2204 5.08145 13.3919C5.08145 15.5634 5.94407 17.6459 7.47953 19.1814C9.01499 20.7168 11.0975 21.5794 13.269 21.5794C15.4405 21.5794 17.523 20.7168 19.0585 19.1814Z" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" shape-rendering="crispEdges"></path>
                            </g>
                        </g>
                        <defs>
                            <filter id="filter0_d_2_17" x="-0.418549" y="3.70435" width="29.7139" height="29.7139" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix>
                                <feOffset dy="4"></feOffset>
                                <feGaussianBlur stdDeviation="2"></feGaussianBlur>
                                <feComposite in2="hardAlpha" operator="out"></feComposite>
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"></feColorMatrix>
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_2_17"></feBlend>
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2_17" result="shape"></feBlend>
                            </filter>
                            <clipPath id="clip0_2_17">
                                <rect width="28.0702" height="28.0702" fill="white" transform="translate(0.403503 0.526367)"></rect>
                            </clipPath>
                        </defs>
                    </svg>   
                </button>
            </div>
        </ul>  
        <button class="btn-default">
            <a href="../frontend/campanha.php">Crie sua campanha</a>
        </button>
        <div class="d-flex">
            <a href="../backend/sair.php" class="btn btn-danger me-5">Sair</a>
        </div>
    </nav>
  </header>
  <section id="titulo"><h1>Projetos</h1></section>
  <div id="welcome-message"></div> <!-- Adicione este elemento -->
  <main id="conteudo">
    <?php foreach ($campanhas as $campanha): ?>
      <div class="card" id="card-<?php echo $campanha['id']; ?>">
        <div class="card2">
          <div id="main-page-<?php echo $campanha['id']; ?>" class="container">     
            <div class="image-box">
            <h2><?php echo htmlspecialchars($campanha['titulo']); ?></h2><br><br>
            </div>
            <div class="info-box">
             
      
              <p><strong>Meta de arrecadação:</strong> R$ 
              <?php 
                // Remova qualquer caractere não numérico, exceto ponto e vírgula
                $meta = preg_replace('/[^0-9.]/', '', $campanha['meta']);
                // Converta para float
                $meta = (float) $meta;
                // Formate o número
                echo number_format($meta, 2, ',', '.'); 
              ?>
              </p>
              <p><strong>Localização:</strong> <?php echo $campanha['localizacao']; ?></p>
            </div>
            <button class="btn-primary" onclick="showSection('card-<?php echo $campanha['id']; ?>', 'pix-page-<?php echo $campanha['id']; ?>')">Apoiar com Pix</button>
            <button class="btn-secondary" onclick="showSection('card-<?php echo $campanha['id']; ?>', 'contato-<?php echo $campanha['id']; ?>')">Mais Informações</button>
          </div>
          <!-- Página de Apoio com Pix -->
          <div id="pix-page-<?php echo $campanha['id']; ?>" class="container hidden pix-page">
            <h1 style="color: cyan;">Apoie com Pix</h1>
            <p><strong>Chave Pix:</strong> <?php echo htmlspecialchars($campanha['pix']); ?></p>
            <button class="btn-secondary" onclick="showSection('card-<?php echo $campanha['id']; ?>', 'main-page-<?php echo $campanha['id']; ?>')">Voltar</button>
          </div>

          <!-- Página de Informações -->
          <div id="contato-<?php echo $campanha['id']; ?>" class="container hidden contato">
            <h1 class="details-title">Detalhes do Projeto</h1>
            <div class="image-box">
              <p><strong>Descrição:</strong> <?php echo htmlspecialchars($campanha['descricao']); ?></p>
            </div>
            <div class="info-box">
              <p><strong>Contato:</strong> <?php echo htmlspecialchars($campanha['contato']); ?></p>
              <p><strong>Tipo de crowdfunding:</strong> <?php echo ucfirst($campanha['crowdfunding']); ?></p>
              <p><strong>Criador:</strong> <?php echo $campanha['criador']; ?></p>
            </div>
            <button class="btn-secondary" onclick="showSection('card-<?php echo $campanha['id']; ?>', 'main-page-<?php echo $campanha['id']; ?>')">Voltar</button>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </main>
</body>
</html>