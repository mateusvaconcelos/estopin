<?php
	/* ativando array $_SESSION */
	session_start();
	
	/* testado existência variável de sessão */
	if(!isset($_SESSION['autorizado'])){
		header("Location: login.php");
	}
	
	/* arquivo de configuação */
	require 'config.php';
	
	/* classe para manipular MySQL */
	require 'classes/Db.class.php';
	
	/* criar um objeto da class Db */
	$banco = new DB();
	
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>:: Administração Pet Shop ::</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">PetShop</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Pesquisar" aria-label="Pesquisar">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="sair.php" id="btnSair">Sair</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              
              <?php
                /* 
                  restringir visualização destes menus para
                  (1) Administrador e (3) Atendente
                */
                if(
                    $_SESSION['tpPerfil'] == 1 OR 
                    $_SESSION['tpPerfil'] == 3
                  ) {

              ?>
                  <li class="nav-item">
                    <a class="nav-link" href="perfil-lista.php">
                      <span data-feather="file"></span>
                      Perfil - Lista
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="perfil-cadastro.php">
                      <span data-feather="user-plus"></span>
                      Perfil - Cadastro
                    </a>
                  </li>
              <?php
                }
              ?>
                <li class="nav-item">
                    <a class="nav-link" href="pets-lista.php">
                      <span data-feather="gitlab"></span>
                      Meus Pets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pets-cad.php">
                      <span data-feather="file"></span>
                      Cadastrar novo pet</a>
                </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">