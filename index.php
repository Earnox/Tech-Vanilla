<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


  <title>Document</title>
</head>


<body>
  <h1> test</h1> </i>
  <div class="container d-flex flex-wrap">
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
    $manager = new ArticlesManager();
    $articles = $manager->getall();
    foreach ($articles as $article) : ?>

      <div class=" m-2 card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?= $article->getTitle() ?></h5>
          <p class="card-text"><?= $article->getContent() ?> </p>
          <a href="#" class="btn btn-primary"></a>
          <a href="./uptateArticle.php" class="btn btn-warning"></i></a>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    <?php endforeach ?>

  </div>
  <script src="https://use.fontawesome.com/f00427c155.js"></script>

</body>

</html>