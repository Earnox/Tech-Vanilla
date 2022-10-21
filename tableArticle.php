<?php require("./header.php"); ?>
<div class="container d-flex">
  <h1 class="d-flex"> intervention en cour </h1>
</div>
<div class="container d-flex flex-wrap">

  <table class="table table-striped">

    <tbody>
      <?php
      $manager = new ArticlesManager();
      $articles = $manager->getall();
      foreach ($articles as $article) : ?>

        <div class=" m-2 card" style="width: 18rem;">
          <!-- <img src="..." class="card-img-top" alt="..."> -->
          <div class="card-body">
            <h5 class="card-title"><?= $article->getTitle() ?></h5>
            <p class="card-text"><?= substr($article->getContent(), 0, 30) ?> </p>
            <a href="./readArticle.php?id=<?= $article->getId() ?>" class=""><i class="fas fa-eye"></i> Lire plus...</a>
            <a href="./uptateArticle.php?id=<?= $article->getId() ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
            <a href="./deleteArticle.php?id=<?= $article->getId() ?>" class=" btn btn-danger"><i class="fas fa-trash-alt"></i></a>
          </div>
        </div>

        <tr>
          <th scope="row"><?= $article->getTitle() ?></th>
          <td><?= substr($article->getContent(), 0, 20) ?> </td>
          <td> <a href="./uptateArticle.php?id=<?= $article->getId() ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a></td>
          <td><a href="./readArticle.php?id=<?= $article->getId() ?>" class=""><i class="fas fa-eye"></i> Lire plus...</a></td>
        </tr>


      <?php endforeach ?>
    </tbody>
  </table>
</div>


</body>

</html>