<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-04 19:28:57 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-20 20:47:16
 * @Description: This is the header part of the webpages. Contains meta data, navbar and session message display.
 */
?>

<?php
// echo "<pre style='color: white;'>";
// var_dump($_SESSION);
// echo "</pre>";
// echo "<br>";
// echo "<pre style='color: white;'>";
// var_dump($error);
// echo "</pre>";
?>

<!doctype html>
<html lang="en">

<head>
  <title><?= APP_NAME ?></title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.1/dist/pulse/bootstrap.min.css">
  <link rel="stylesheet" href="<?= ASSETS; ?>css/styles.css">

</head>

<body>
  <?php
  // Display additional error details for development
  if (isset($_SESSION['debug'])) {
    echo "<div class='bg-dark text-light p-3'>";
    echo "<pre>";
    echo "<p class='h3 pb-2'>Error details</p>";
    var_dump($_SESSION['debug']);
    echo "</pre>";
    echo "</div>";
    unset($_SESSION['debug']);
  }
  ?>
  <div class="d-flex flex-column" style="min-height: 100vh;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?= BASE; ?>">PHP forum</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" href="<?= BASE; ?>">Home
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
          <div class="navbar-nav ms-auto">
            <?php if (!isset($_SESSION['user'])) : ?>
              <a href="<?= BASE . 'login'; ?>" class="btn btn-info mx-2 rounded">Login</a>
              <a href="<?= BASE . 'signup'; ?>" class="btn btn-secondary mx-2 rounded">Sign Up</a>
            <?php else : ?>
              <a href="<?= BASE . 'logout'; ?>" class="btn btn-danger mx-2 rounded">Log out</a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </nav>


    <div class="container mt-5">

      <?php if (isset($_SESSION['messages'])) :
        foreach ($_SESSION['messages'] as $type => $msgs) :
          foreach ($msgs as $msg) :
      ?>

            <div class="w-50 text-center mx-auto alert alert-<?= $type; ?>"> <?= $msg; ?> </div>


      <?php endforeach;
        endforeach;
        //* removing every messages saved of the current session.
        unset($_SESSION['messages']);
      endif;
      ?>
    </div>