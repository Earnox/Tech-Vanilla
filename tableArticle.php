<?php require("./header.php");

?>

<div class="container d-flex">
  <h1 class="d-flex"> intervention en cour </h1>
</div>
<div class="container d-flex flex-wrap">

  <table class="table table-striped">

    <tbody>
      <thead>
        <th>lieu</th>

        <th>statut ?</th>


      </thead>
      <?php
      $manager = new ArticlesManager();
      $articles = $manager->getall();

      foreach ($articles as $article) :

      ?>

        <tr>


          <th scope="row"><?= $article->getTitle() ?></th>
          <td class="card-text"><?= $article->getStatut(); ?></td>
          <td class="card-text"><?= dateTable($article->getStartDate()); ?></td>
          <td class="card-text"><?= $article->getPost(); ?></td>

          <td><a href="./readArticle.php?id=<?= $article->getId() ?>" class=""><i class="fas fa-eye fs-4"></i> </a></td>
          <!-- <td> <a href="./uptateArticle.php?id= " class="btn btn-warning"><i class="fas fa-edit"></i></a></td> -->
          </td>
          <?php if (null !== $article->getPrioritaire()) {
          ?><th class=" "><i class=" text-danger fas fa-exclamation-circle fs-4"></i> </th><?php
                                                                                          } else { ?>
            <th></th>
          <?php
                                                                                          } ?>
        </tr>


      <?php endforeach


      ?>
    </tbody>
  </table>




</div>

<?php require 'footer.php';
