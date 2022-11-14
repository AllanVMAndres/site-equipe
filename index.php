<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
  <link href="css/style.css" rel="stylesheet">
  <title>Document</title>
</head>

<body>
  <!-- menu inicio -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark py-3">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.html">
        <img src="img/logo-pandora.png" alt="Logo" width="50" height="52" class="d-inline-block align-text-center">
        PandoraBox
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active me-2" aria-current="page" href="index.html">HOME</a>
          <a class="nav-link" href="#sobre">SOBRE</a>
          <a class="nav-link" href="#servicos">SERVIÇOS</a>
          <a class="nav-link" href="#port">PORTFÓLIO</a>
          <a class="nav-link" href="#atualizacao">BLOG</a>
        </div>
      </div>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search" id="search-b">
        <button class="btn btn-outline-success" type="submit">PESQUISAR</button>
      </form>
    </div>
  </nav>
  <!-- menu fim -->
  <!-- carroussel inicio -->
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner" id="car-box">
      <?php

      include("conexao.php");

      $q1 = mysqli_query($conexao,"SELECT * FROM carrossel ORDER BY id_car;");

      while($e1 = mysqli_fetch_array($q1)){
        echo '<div class="carousel-item active">
        <img src="img/'. $e1[3] .'" class="d-block w-100" alt="..." id="car">
        <div class="carousel-caption d-none d-md-block" id="car-t">
          <h3>'. $e1[1] .'</h3>
          <p>'. $e1[2] .'</p>
        </div>
        </div>';
      }
      ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Próximo</span>
    </button>
  </div>
  <!-- carroussel fim -->
  <!-- conteudo inicio -->
  <br><br>
  <?php 

  $q2 = mysqli_query($conexao,"SELECT * FROM conteudo WHERE id_cont = 1");
  $e2 = mysqli_fetch_array($q2);
  $q3 = mysqli_query($conexao,"SELECT membro.id_mem, membro.nome_mem, membro.nome_img_mem FROM membro INNER JOIN conteudo ON membro.id_cont = conteudo.id_cont ORDER BY membro.id_mem;");

  echo '<center>
    <h1 id="sobre">'. $e2[1] .'</h1>
  </center>
  <br>
  <h4 id="text-jus">'. $e2[2] .'</h4>
  <br>
  <br>
  <table>
  <tr>';

    while($e3 = mysqli_fetch_array($q3)){
      echo '<td><img src="img/'. $e3[2] .'" class="rounded-pill border border-dark p-2 mb-2 border-opacity-25" alt="..."
          id="pessoas"><br><h4 id="text">'. $e3[1] .'</h4></td>';
    }
    
    echo '</tr>
    <tr>
    </table>';
  ?>
  <!-- servicos inicio -->
  <br><br>
  <div id="serv">
    <hr><br>
    <?php

    $q4 = mysqli_query($conexao,"SELECT * FROM conteudo WHERE id_cont = 2");
    $e4 = mysqli_fetch_array($q4);
    $q5 = mysqli_query($conexao,"SELECT servico.* FROM servico INNER JOIN conteudo ON servico.id_cont = conteudo.id_cont WHERE id_serv<=3 ORDER BY servico.id_serv;");
    $q6 = mysqli_query($conexao,"SELECT servico.* FROM servico INNER JOIN conteudo ON servico.id_cont = conteudo.id_cont WHERE id_serv>3 ORDER BY servico.id_serv;");

    echo '<center>
      <h1 id="servicos">'. $e4[1] .'</h1>
    </center>
    <br><br>
    <div id="services" class="container-fluid text-center">'.
      '<div class="row slideanim">';
        
        while($e5 = mysqli_fetch_array($q5)){
        echo '<div class="col-sm-4">
          <span class="glyphicon glyphicon-off logo-small"><img src="img/'. $e5[3] .'" alt="Logo" width="80vw"
              height="80vw"></span>
          <h4>'. $e5[1] .'</h4>
          <p>'. $e5[2] .'</p>
        </div>';
        }

      echo '</div>
      <br><br>
      <div class="row slideanim">';

      while($e6 = mysqli_fetch_array($q6)){
        echo '<div class="col-sm-4">
          <span class="glyphicon glyphicon-off logo-small"><img src="img/'. $e6[3] .'" alt="Logo" width="80vw"
              height="80vw"></span>
          <h4>'. $e6[1] .'</h4>
          <p>'. $e6[2] .'</p>
        </div>';
        }

      echo '</div>
    </div>';
    ?>
    <!-- servico fim -->
    <!-- outros projetos inicio -->
    <br><br>
    <hr>
  </div>
  <br id="port">
  <?php 

  $q10 = mysqli_query($conexao,"SELECT * FROM conteudo WHERE id_cont = 3");
  $e10 = mysqli_fetch_array($q10);
  $q7 = mysqli_query($conexao,"SELECT projeto.* FROM projeto");

  echo '<center>
    <h1>'. $e10[1] .'</h1>
  </center>
  <br>';

  while($e7 = mysqli_fetch_array($q7)){
  
  $q8 = mysqli_query($conexao,"SELECT imgprojeto.nome_img FROM imgprojeto INNER JOIN projeto ON imgprojeto.id_proj = projeto.id_proj ORDER BY id_img LIMIT 3;");
  $q9 = mysqli_query($conexao,"SELECT imgprojeto.nome_img FROM imgprojeto INNER JOIN projeto ON imgprojeto.id_proj = projeto.id_proj ORDER BY id_img DESC LIMIT 2;");

  echo '<div class="card mb-3" style="max-width: 100%;">
    <div class="row g-0">
      <div class="col-md-4">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">';

            while($e8 = mysqli_fetch_array($q8)){
            echo '<div class="carousel-item active">
              <img src="img/'. $e8[0] .'" class="d-block w-100" alt="...">
            </div>';
            }
            
          echo '</div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h2 class="card-title">'. $e7[1] .'</h2>
          <p class="card-text" id="text-port">'. $e7[2] .'</p>
          <br>';

          while($e9 = mysqli_fetch_array($q9)){
            echo '<img src="img/'. $e9[0] .'" class="float-right p-2 mb-2" height="80vw">';
          }

          echo '<p class="card-text"><small class="text-muted">Atualizado em '. $e7[4] .'</small></p>
        </div>
      </div>
    </div>
  </div>';
  }
  ?>
  <!-- outros projetos fim -->
  <!-- atualizacoes inicio -->
  <br><br>
  <div id="atu">
    <hr>
    <br>

    <?php 
    $q11 = mysqli_query($conexao,"SELECT * FROM conteudo WHERE id_cont = 4");
    $e11 = mysqli_fetch_array($q11);
    $q12 = mysqli_query($conexao,"SELECT nome_img_blog FROM blog ORDER BY id_blog;");
    $q13 = mysqli_query($conexao,"SELECT * FROM blog ORDER BY id_blog;");

    echo '<center>
      <h1 id="atualizacao">'. $e11[1] .'</h1>
    </center>
    <br>
    <p>';
      
      while($e12 = mysqli_fetch_array($q12)){
      $i=1;
      echo '<a class="btn" data-bs-toggle="collapse" href="#multiCollapseExample'.$i.'" role="button" aria-expanded="false"
        aria-controls="multiCollapseExample'.$i.'" id="btn-atu"><img src="img/'. $e12[0] .'" class="rounded float-start"
          alt="..." id="atu-img"></a>';
      $i=$i+1;
      }

    echo '</p>
    <div class="row">';

      while($e13 = mysqli_fetch_array($q13)){
      $i=1;
      echo '<div class="col">
        <div class="collapse multi-collapse" id="multiCollapseExample'.$i.'">
          <div class="card card-body text-bg-dark opacity-75">'. $e13[2] .
          '</div>
        </div>
      </div>';
      $i=$i+1;
      }

    echo '</div>';
    ?>
    <!-- atualizacoes fim -->
    <!-- footer inicio-->
    <br><br>
  </div>
  <footer class="text-center text-lg-start bg-dark text-bg-dark">
    <section>
      <br>
      <div class="container text-center text-md-start mt-5">
        <div class="row mt-3">
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <h4 class="text-uppercase fw-bold mb-4"><img src="img/logo-pandora.png" alt="Logo" id="foot">PandoraBox</h6>
              <p>
                A PandoraBox é um grupo voltado ao mercado de tecnologia, atuante em desenvolvimento de softwares
                multiplataforma.
              </p>
          </div>
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-4">
              Produtos
            </h6>
            <p>
              <a href="#port" class="text-reset">LibraTour</a>
            </p>
            <br>
            <p><img src="img/cont-face.png" id="foot-icon-2"><img src="img/cont-insta.png" id="foot-icon-2"></p>
            <p><img src="img/cont-twit.png" id="foot-icon-2"><img src="img/cont-ytb.png" id="foot-icon-2"></p>
          </div>
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <h6 class="text-uppercase fw-bold mb-4">Contatos</h6>

            <?php 
            $q14 = mysqli_query($conexao,"SELECT * FROM contato ORDER BY id_conta");

            while($e14 = mysqli_fetch_array($q14)){
              echo'<p><img src="img/'. $e14[3] .'" id="foot-icon"> '. $e14[2] .'</p>';
            }
            ?>

          </div>
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-4">
              Mande uma Mensagem
            </h6>
            <p>
              <form method='post' action="cadastro.php">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Endereço de Email</label>
              <input type="email" class="form-control" name="email" placeholder="nome@exemplo.com">
            </div>
            </p>
            <p>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Comentário</label>
              <textarea class="form-control" name="texto" rows="3"></textarea>
            </div>
            </p>
            <p>
            <div class="col-auto">
              <button type="submit" class="btn btn-secondary mb-3">Confirmar Envio</button>
            </div>
            </form>
            </p>
          </div>
        </div>
      </div>
      <br>
    </section>
  </footer>
  <!-- footer fim-->
</body>

</html>