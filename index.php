<?php
session_start();

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupo de Amigos Veterano 5 Marias</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="stylecarrocel.css">
    
</head>
<body>
    <header>
        <div class="logo">
            <img src="img/logo.jpg" alt="Logo do Grupo">
        </div>
        
        <div class="logo25">
            <div class="logo-texto">
                <img src="img/25.jpg" alt="Logo 25 Anos">
                <h2>anos</h2>
            </div>
               <p>Bem-vindo ao Grupo de Amigos Veterano 5 Marias.</p>
        </div>
<!-- 
        <nav>
            <ul>
                <li><a href="index.php" title="home">Home</a></li>
                <li><a href="sobre.php" title="sobre">Sobre</a></li>
                <li><a href="jogos.php">Jogos</a></li>
                
                <?php
                if (isset($_SESSION["usuario_logado"])) {
                    echo '<li><span>' . $_SESSION["usuario_logado"] . '</span></li>';
                    echo '<li><a href="logout.php">Logout</a></li>';
                } else {
                    echo '<li><a href="login.html">Login</a></li>';
                    echo '<li><a href="cadastro.html">Cadastro</a></li>';
                }
                ?>
            </ul>
        </nav>-->
    </header>
     <!-- Swiper carrossel-->
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <img src="img/bandeira.jpg" />
      </div>
      <div class="swiper-slide">
        <img src="img/logo.jpg" />
      </div>
      <div class="swiper-slide">
        <img src="img/patrocinadores/wbd2.jpg" />
      </div>
      <div class="swiper-slide">
        <img src="img/patrocinadores/magnatas2.jpg" />
      </div>
      <div class="swiper-slide">
        <img src="img/patrocinadores/wilianbar2.jpg" />
      </div>
      <div class="swiper-slide">
        <img src="img/patrocinadores/pontocerto2.jpg" />
      </div>
      <div class="swiper-slide">
        <img src="img/noticia/noticia1.jpg" />
      </div>
      <div class="swiper-slide">
        <img src="img/noticia/noticia2.jpg" />
      </div>
      <div class="swiper-slide">
        <img src="img/noticia/noticia3.jpg" />
      </div>
    </div>
    <div class="swiper-pagination"></div>
  </div>
  <hr class="linhaprata">
    <main>
      <!-- Seção destaque-->
        <section class="destaque">
            <h2>Próximos Jogos</h2>
            <div class="jogos">
                </div>
        </section>
        <hr class="linhaprata">
        <!-- Seção noticias-->
         <h2>Últimas Notícias</h2>
            <section class="noticias"></section>
            <div class="noticias">
                <div class="noticia">
                    <img src="img/noticia/vermelhovenceu.jpg" alt="Notícia 1">
                    <p>Nada mudou até na pré-temporada o vermelho venceu.</p>
                </div>
                <div class="noticia">
                    <img src="img/noticia/goleiro.jpg" alt="Notícia 2">
                    <p>Em coletiva do goleiro André, ele explica os 8 gols e promete melhorar.</p>
                </div>
                <div class="noticia">
                    <img src="img/noticia/pele.jpg" alt="Notícia 3">
                    <p>Jogador se prepara, mas só vai para o segundo tempo. Porque será?.</p>
                </div>
            </div>
        </section>
    </main>
    <hr>
    <!-- Patrocinadores Oficiais-->
     
    <div class="sponsors-container">
      <div class="sponsors-title">Patrocinadores oficiais</div>
      <ul class="sponsors-list">
          <li class="sponsor-item">
              <a href="https://www." target="_blank" title="WBD Veículos">
                  <img src="img/patrocinadores/wbd2.jpg" alt="WBD Veículos">
              </a>
          </li>
          <li class="sponsor-item">
              <a href="https://www.instagram.com/casadosmagnatas?igsh=ZXp2bnhlazB1eXR0" target="_blank" title="MAGNATAS Distribuidora">
                  <img src="img/patrocinadores/magnatas2.jpg" alt="MAGNATAS Distribuidora">
              </a>
          </li>
          <li class="sponsor-item">
              <a href="https://www." target="_blank" title="WILIAN bar e refeições">
                  <img src="img/patrocinadores/wilianbar2.jpg" alt="WILIAN bar e refeições ">
              </a>
          </li>
          <li class="sponsor-item">
              <a href="https://www." target="_blank" title="MERCADO PONTO CERTO">
                  <img src="img/patrocinadores/pontocerto2.jpg" alt="MERCADO PONTO CERTO">
              </a>
          </li>
          <li class="sponsor-item">
              <a href="http://www." target="_blank" title="5 MARIAS Material de construção">
                  <img src="img/patrocinadores/materialdeconstrucao2.jpg" alt="5 MARIAS MATERIAL DE CONSTRUÇÃO">
              </a>
          </li>
          <li class="sponsor-item">
              <a href="https://WWW." target="_blank" title="Projeto VILELA">
                  <img src="img/patrocinadores/vilela2.jpg" alt="PROJETO VILELA">
              </a>
          </li>
          <li class="sponsor-item">
              <a href="https://www." target="_blank" title="Depósito da PRAÇA">
                  <img src="img/patrocinadores/depositodapraca2.jpg" alt="DEPOSITO DA PRAÇA">
              </a>
          </li>
          <li class="sponsor-item">
              <a href="https://www." target="_blank" title="DS Centro Automotivo">
                  <img src="img/patrocinadores/ds_automotivo.jpg" alt="DS Centro Automotivo">
              </a>
          </li>
          
      </ul>
  </div>
    <hr>
    <!--Parceiros Oficiais-->
    <div class="sponsors-container">
        <div class="sponsors-title">Parceiros oficiais</div>
        <ul class="sponsors-list">
            <li class="sponsor-item">
                <a href="https://www." target="_blank" title="Barbeshop Vinicius Negão">
                    <img src="img/patrocinadores/barbeshop.jpg" alt="Barbeshop Vinicius Negão">
                </a>
            </li>
            <li class="sponsor-item">
                <a href="https://www." target="_blank" title="Diniz Multi marcas">
                    <img src="img/patrocinadores/diniz.jpg" alt="Diniz Multi marcas">
                </a>
            </li>
            <li class="sponsor-item">
                <a href="https://www." target="_blank" title="Eletronica Durval feijão">
                    <img src="img/patrocinadores/feijao.jpg" alt="Eletronica Durval feijão">
                </a>
            </li>
            <li class="sponsor-item">
                <a href="https://www." target="_blank" title="LF Cell Assistência Técnica ">
                    <img src="img/patrocinadores/leocell.jpg" alt="LF Cell Assistência Técnica">
                </a>
            </li>
            <li class="sponsor-item">
                <a href="http://www." target="_blank" title="Mansao021">
                    <img src="img/patrocinadores/mansao021.jpg" alt="Mansao021">
                </a>
            </li>
            <li class="sponsor-item">
                <a href="https://www." target="_blank" title="Paaria O Rei do pão">
                    <img src="img/patrocinadores/reidopao.jpg" alt="Paaria O Rei do pão">
                </a>
            </li>
            <li class="sponsor-item">
                <a href="https://www." target="_blank" title="Thiago Fernandes Enxovais">
                    <img src="img/patrocinadores/thiago.jpg" alt="Thiago Fernandes Enxovais">
                </a>
            </li>
            <li class="sponsor-item">
                <a href="https://www." target="_blank" title="VSouza Construções e Reformas">
                    <img src="img/patrocinadores/valquir.jpg" alt="VSouza Construções e Reformas">
                </a>
            </li>
            <li class="sponsor-item">
                <a href="https://www./" target="_blank" title="Studio de Beleza Daniele Costa">
                    <img src="img/patrocinadores/danielecosta2.jpg" alt="Studio de Beleza Daniele Costa">
                </a>
            </li>
            <li class="sponsor-item">
              <a href="https://www./" target="_blank" title="Bar da Saideira">
                  <img src="img/patrocinadores/bardasaideira.jpg" alt="">
              </a>
          </li>
        </ul>
    </div>
    <!-- Footer -->
    <footer class="footer">
      <div class="footer-content">
          <div class="footer-logo">
              <a href="" title="VETERANO 5 MARIAS">
                  VETERANO 5 MARIAS
              </a>
          </div>
  
          <nav class="footer">
            <ul>
                <li class="lifooter"><a href="index.php">Home</a></li>
                <li class="lifooter"><a href="sobre.php">Sobre</a></li>
                <li class="lifooter"><a href="jogos.php">Jogos</a></li>
                <li class="lifooter"><a href="login.html">Login</a></li>
                <li class="lifooter"><a href="cadastro.html">Cadastro</a></li>
            </ul>
        </nav>
  
          
          <div class="footer-social">
              <h3>Siga-nos em</h3>
              <ul>
            <!-- 
                  <li><a href="https://x.com/"><img src="img/x.png" alt="X" target="_blank"></a></li>
                  <li><a href="https://www.facebook.com/" target="_blank"><img src="img/FACEBOOK.jpeg" alt="Facebook" target="_blank"></a></li>
                  <li><a href="http://www.youtube.com/"><img src="img/youtube.png" alt="YouTube" target="_blank"></a></li>
            -->      
                  <li><a href="https://www.instagram.com/grupoamigosveteranos5marias?igsh=MTI1M2Fia2ZvMW1u" target="_blank"> <img src="img/INSTAGRAM.jpeg" alt="Instagram"></a></li>
              </ul>
          </div>
  
          <div class="footer-bottom">
              
              <div class="footer-disclaimer">
                  <p>&copy; 2025 Grupo de Amigos Veterano 5 Marias. All rights reserved.</p>
                 
              </div>
          </div>
      </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>
  <script src="carrossel.js" defer></script>
  
  
</body>
</html>