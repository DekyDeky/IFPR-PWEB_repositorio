<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Bootstrap 5 Website Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Monsieur+La+Doulaise&display=swap');

    .logolegal{
        display: flex;
        align-items: center;
        flex-direction: column;
        gap: 15px;
    }
    
    .logoSitelink {
        width: 250px;
        height: 250px;
    }

    .logoSite {
        width: 100%;
        height: 100%;
        background-image: url('imgs/logo.webp');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }

    .logoSite:hover {
        background-image: url('imgs/cat-spinning.gif');
        background-size: contain;
    }

  .fakeimg {
    height: 200px;
    background: #aaa;
  }

  .me {
    background-image: url('imgs/me.jpg');
    background-repeat: no-repeat;
    background-position: 50% 20%;
    background-size: cover;
  }

  .siteTitle {
    font-family: "Monsieur La Doulaise", cursive;
    font-weight: 400;
    font-style: normal;
    font-size: 48px;
  }

  </style>
</head>
<body>

    <div class="logolegal p-5 text-black text-center">
        <a class="logoSitelink" href="index.php" title="Retornar à página principal">   
             <div class="logoSite"></div>
            <!-- <img class="logoSistema" src="imgs/logo.webp" alt="Logotipo do Sistema" style="width:150px;"> -->
        </a>
        <h2 class="siteTitle">Car...</h2>
    </div>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar" style="background: none; border: none;">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Ínicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formProduto.php">Cadastrar Produto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formLogin.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<div class="container mt-5" style="margin-bottom: 100px;">
    <div class="alert alert-info text-center">
        <p>Há <strong>X</strong> produtos cadastrados</p>
    </div>
    <form name="formFiltro" action="index.php" method="GET">
        <div class="form-floating mt-3">
            <select class="form-select" name="filtroProduto">
                <option value="todos">Visualizar todos os produtos.</option>
                <option value="disponível">Visualizar produtos disponíveis.</option>
                <option value="esgotado">Vizualizar produtos esgotados.</option>
            </select>
            <label for="filtroProduto">Selecione um filtro: </label>
        </div><br>
        <button type="submit" class="btn btn-success" style="float: right;">Filtrar Produtos</button><br>
    </form><br>
    <hr>
  <div class="row">
    <div class="col-sm-3">
        <div class="card" style="width:400px">
            <img class="card-img-top" src="imgs/notme.jpg" alt="Card image">
            <div class="card-body text-center">
                <h4 class="card-title">Nome do produto</h4>
                <p class="card-text">Preço do Produto</p>
                <a href="#" class="btn btn-primary">Veja mais</a>
            </div>
        </div>
    </div>
  </div>
</div>

<div class="mt-5 p-4 bg-dark text-white text-center fixed-bottom">
  <p>Sistema genérico desenvolvido nas aulas de Programação Web do curso de TADS3</p>
</div>

</body>
</html>
