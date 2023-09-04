<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-04 19:28:57 
 * @Last Modified by:   undefined 
 * @Last Modified time: 2023-09-04 19:28:57
 * @Description: This is the header part of the webpages. Contains meta data, navbar and session message display.
 */
?>

<!doctype html>
<html lang="en">

<head>
  <title><?= CONFIG['app']['name'] ?></title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.3/lux/bootstrap.min.css" integrity="sha512-+TCHrZDlJaieLxYGAxpR5QgMae/jFXNkrc6sxxYsIVuo/28nknKtf9Qv+J2PqqPXj0vtZo9AKW/SMWXe8i/o6w==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Mon blog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" href="<?= BASE; ?>">Accueil
              <span class="visually-hidden">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Articles</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">BACK OFFICE</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="">Ajouter un téléphone</a>
              <a class="dropdown-item" href="">Gestion téléphone</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-5">

    <?php if (isset($_SESSION['messages'])) :
      foreach ($_SESSION['messages'] as $type => $messages) :
        foreach ($messages as $message) :
    ?>

          <div class="w-50 text-center mx-auto alert alert-<?= $type; ?>"> <?= $message; ?> </div>


    <?php endforeach;
      endforeach;
      //* suppression de tout les messages sauvegardé dans la session.
      unset($_SESSION['messages']);
    endif;
    ?>


  </div>