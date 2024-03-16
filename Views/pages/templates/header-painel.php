<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_FULL ?>css/style-painel.css">
    <script src="https://kit.fontawesome.com/41651576e2.js" crossorigin="anonymous"></script>   
    <script src="<?php echo INCLUDE_PATH ?>js/jquery-3.7.1.min.js"></script>
    <script src="<?php echo INCLUDE_PATH ?>js/painel.js"></script>
    <title></title>
</head>
<body>

<div class="side-bar">
    <div class="boxUsuario">
        <div class="avatarUser">
    </div>
        <div class="nomeUser">
        <div class="infoUser"><h3><?php echo $_SESSION['nome_completo']; ?></h3></div><!-- infoUser -->
        </div><!-- nomeUser -->
        <div class="cargoUser">
        <div class="infoUser"><span><h3>Gestor(a) de Eventos</h3></span></div><!-- infoUser -->
    </div><!-- CargoUser -->
    </div><!-- boxUsuario -->
<div class="side-content">
    <p class="side-bold">Administração do Painel</p>
    <a href="<?php echo INCLUDE_PATH ?>painel/cadastro-usuario" class="side-text">Cadastrar Usuário</a>
    <a href="#" class="side-text">Editar Usuário</a>
    <a href="#" class="side-text">Cadastrar Usuário</a>
</div>
</div><!-- sidebar -->

<header>
        <a href=""><i class="fa-solid fa-comment"></i></a>
        <a href="<?php echo INCLUDE_PATH ?>painel"><i class="fa-solid fa-house"></i></a>
        <a href="<?php echo INCLUDE_PATH ?>painel/desconectar"><i class="fa-solid fa-right-from-bracket"></i></a>
</header><!-- header -->

<div class="content">
