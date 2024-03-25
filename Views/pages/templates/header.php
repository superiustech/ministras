<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_FULL ?>css/style.css">
    <script src="<?php echo INCLUDE_PATH ?>js/jquery-3.7.1.min.js"></script>
    <script src="<?php echo INCLUDE_PATH ?>js/home.js"></script>
    <script src="https://kit.fontawesome.com/41651576e2.js" crossorigin="anonymous"></script>   
    <title><?php echo $arr['titulo']; ?></title>
</head>
<body>
<header>
        <div class="menu">
            <button><i class="fa-solid fa-bars"></i></button class="menu">
            <img src="<?php echo INCLUDE_PATH?>uploads/logo.png" alt="logo">
        </div>
        <div class="content-sidebar">
            <div class="side-bar">
                <div class="side-content">
                    <p class="side-bold">Navegação</p>
                    <a href="<?php echo INCLUDE_PATH ?>" class="side-text">Home</a>
                    <a href="<?php echo INCLUDE_PATH ?>eventos" class="side-text">Eventos</a>
                    <a href="<?php echo INCLUDE_PATH ?>faq" class="side-text">FAQ</a>
                </div>
            </div><!-- sidebar -->
        </div>
        <div class="content-header">
            <img src="<?php echo INCLUDE_PATH?>uploads/logo.png" alt="logo">
            <a href="<?php echo INCLUDE_PATH ?>home">Home</i></a>
            <a href="<?php echo INCLUDE_PATH ?>eventos">Eventos</a>
            <a href="<?php echo INCLUDE_PATH ?>faq">FAQ</a>
            </div><!-- content-header -->
            <div class="social-header">
            <a href="<?php echo INCLUDE_PATH ?>"><i class="fa-brands fa-instagram fa-lg"></i></a>
            <a href="<?php echo INCLUDE_PATH ?>"><i class="fa-brands fa-whatsapp"></i></a>
            <a href="<?php echo INCLUDE_PATH ?>"><i class="fa-brands fa-youtube"></i></a>
            <a href="<?php echo INCLUDE_PATH ?>"><i class="fa-brands fa-spotify"></i></a>


            </div><!-- social-header -->
    </header><!-- header -->

   
