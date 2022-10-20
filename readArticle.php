<?php require("./header.php");
$manager = new ArticlesManager();
$article = $manager->getById($_GET['id']);
?>
<div class="container mt-2">
  <h3><?= $article->getTitle() ?></h3>
  <div class=" m-2 card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title"><?= $article->getTitle() ?></h5>
      <p class="card-text"><?= substr($article->getContent(), 0, 80) ?> </p>
      <a href="./uptateArticle.php?id=<?= $article->getId() ?>" class="btn btn-warning">uptateArticle</a>
      <a href="./deleteArticle.php?id=<?= $article->getId() ?>" class=" btn btn-danger">delArticle</a>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>
</div>

</div>


</body>

</html>