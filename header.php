<?php function niceVra($data)
{
  echo "<pre>";
  print_r($data);
  echo "<pre>";
}
// {
//   $type = gettype($data); //tu récupères le type de ta data, et avec le if tu conditionnes la méthode d'affichage au type

//   echo "<pre>";
//   if ($detailed === true) { //ton deuxième paramètre sera tru si tu veux afficher le type de ta $data
//     var_dump($data);
//   } else {
//     if ($type === "string") { //Sinon on fait juste un echo pour les string et print_r pour le reste
//       echo $data;
//     } else {
//       print_r($data);
//     }
//   }
//   echo "</pre>";
// }


function dateTable($date)
{
  $date = new DateTime($date);
  echo $date->format("d/m ");
}
function dateCardTable($date)
{
  $date = new DateTime($date);
  echo $date->format("H:i:s d/m/y");
}
// header('Content-Type: text/html; charset=utf-8');
?>


<!DOCTYPE html>
<html lang="fr">  

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="./css/style.css">
  <title>Intervention Tech</title>
</head>


<body>
  <nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="./index.php">accueil</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item">
            <a class="nav-link" href="./createArticle.php">publier un article </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./tableArticle.php">table</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <?php
  function loadClasses($class)
  {
    if (strpos($class, 'Manager')) {
      require "Controllers/$class.php";
    } else {
      require "Model/$class.php";
    }
  }
  spl_autoload_register("loadclasses");

  ?>
  <?php require './Controllers/BaseManager.php';
  $bsManager = new ArticlesManager();

  niceVra($bsManager->setNameUtf());

  ?>