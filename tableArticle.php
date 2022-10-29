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
        <tr>
          <th scope="row"><?= $article->getTitle() ?></th>
          <td><?= substr($article->getContent(), 0, 20) ?> </td>
          <td> <a href="./uptateArticle.php?id=<?= $article->getId() ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a></td>
          <td><a href="./readArticle.php?id=<?= $article->getId() ?>" class=""><i class="fas fa-eye"></i> Lire plus...</a></td>
          <td><a href="./deleteArticle.php?id=<?= $article->getId() ?>" class=" btn btn-danger"><i class="fas fa-trash-alt"></i></a>
          </td>
        </tr>


      <?php endforeach ?>
    </tbody>
  </table>
</div>


</body>

</html>