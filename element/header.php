<?php 
// pour verifier si la session n'est pas demarrer de la demarer sinon....
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
require_once dirname(__DIR__).DIRECTORY_SEPARATOR. 'fonctions.php'; 
require_once dirname(__DIR__).DIRECTORY_SEPARATOR. 'fonctions' .DIRECTORY_SEPARATOR. 'auth.php'; 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Présentation de THD">
    <title>
        <?= isset($title) ? $title:"Mon site web" ?>
    </title>
    <!-- les feuilles de styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="index.css">
    <!-- <link rel="stylesheet" href="css/styles.css"> -->
</head>
<body>
    <!-- a rechercher -->
    <nav class="navbar navbar-exapand-md navbar-dark bg-dark mb-4">
        <div class="col-md-1">
            <h1><a href="#" class="navbar-brand">THD</a></h1>       
        </div>
        <div class="col-md-9">
            <div class="nav-header">
                <ul>
                    <?= nav_menu('nav-link')?>
                </ul>
                <!-- autre façons de .............. -->
                <!-- <li class="menu"><a href="index.php">Home</a></li>
                <li class="menu"><a href="experience.php">Experiences</a></li>
                <li class="menu"><a href="loisirs.php">Recreation</a></li>
                <li class="menu"><a href="contact.php">Contact</a></li>
                <li class="menu"><a href="jeu.php">Jeu </a></li>            -->
            </div>
        </div>
        <ul class="navbar-nav" >
            <?php if(est_connecter()):  ?>
                <li ><a class="nav-link" href="/logout.php">Log out</a></li>
            <?php endif ?>
        </ul>
        <div class="col-md-1">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault">
                    <span class="navbar-toggler-icon"></span>
            </button>  
        </div>
    </nav>