<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title><?php echo ogsite_name; ?></title>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no"/>
  <meta name="keywords" content="<?php echo keywords; ?>"/>
  <meta name="description" content="<?php echo description; ?>"/>
  <meta name="author" content="<?php echo author; ?>"/>
  <meta property="og:locale" content="pt_BR"/>
  <meta property="og:type" content="article"/>
  <meta property="og:title" content="<?php echo ogtitle; ?>"/>
  <meta property="og:image" content="<?php echo ogimage; ?>"/>
  <meta property="og:image:type" content="image/jpeg"/>
  <meta property="og:image:width" content="1028"/>
  <meta property="og:image:height" content="540"/>
  <meta property="og:url" content="<?php echo ogurl; ?>"/>
  <meta property="og:site_name" content="<?php echo ogsite_name; ?>"/>
  <meta property="og:description" content="<?php echo ogdescription; ?>"/>
  <meta name="google-site-verification" content="123456"/>
  <link rel="shortcut icon" href="<?php echo favicon; ?>"/>
  <link rel="canonical" href="<?php echo canonical; ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>assets/css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>assets/css/jquery.toast.css"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">  
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>assets/css/template.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>assets/css/style.css"/>
</head>
<body>

<header>
	<input type="checkbox" id="btn-menu">
	<label for="btn-menu">&#9776</label>
	<nav class="menu">
		<ul>
			<li><a href="<?php echo BASE_URL;?>">HOME</a></li>
			<li><a href="<?php echo BASE_URL;?>">PRODUTOS</a></li>
			<li><a href="#Sobre" class="nav-item nav-link" data-toggle="modal" data-target="#Sobre">SOBRE</a></li>
      <li><a href="<?php echo BASE_URL;?>users/index">CRUD</a></li>
		</ul>
	</nav>
</header>

<div class="head">
	<div class="col-1a">
    <img src="<?php echo BASE_URL;?>assets/images/logo.png">
  </div>

	<div class="col-2a">
    <form class="form-inline my-2 my-lg-0 pl-3-lg" action="<?php echo BASE_URL.'home/search/';?>" method="post">
      <input class="form-control" id="search" name="search" type="search" placeholder="Pesquisar" aria-label="Search">
      <button class="btn btn-toolbar ml-1" type="submit">
        <img width="24px" height="24px" src="<?php echo BASE_URL;?>assets/images/search.png">
      </button>
    </form>
  </div>
    <a href="<?php echo BASE_URL;?>home/carrinho" class="notification" style="margin-top: 50px;   text-decoration: none;">
    <div class="col-3a">
      <img src="<?php echo BASE_URL;?>assets/images/cart.png">
      <span class="badge" id="qtdecar">0</span>
    </a>
  </div>
</div>

<div class="divisao"></div>

<!--Start Modal -->
<div class="modal fade" id="Sobre" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TituloModalCentralizado">Sobre</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p style="text-align: center;">Carrinho de compras desenvolvido por</p>
        <p style="text-align: center;"><b>Eliseu Carneiro de Oliveira</b></p>
        <p style="text-align: center;">Telefone: (44)99904-4296</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<!--End Modal -->

<div class="container">
  <?php 
    $this->loadViewInTemplate($viewName, $viewData); 
    $qtde = (int)count($_SESSION['carrinho']); 
  ?>
  <script language='javascript'>
    var timer = setTimeout(cfb, 1000);
    function cfb(){
      var y = document.querySelector("#qtdecar");
      y.innerHTML = <?php echo $qtde; ?>;
    }
  </script>