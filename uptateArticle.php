<?php require("./header.php");
$manager = new ArticlesManager();

$article = $manager->getById($_GET['id']);
niceVra($article);
if ($_POST) {
  $article->hydrate($_POST);
  $manager->update($article);
  echo "<script>
    window.location = './index.php'
  </script>";
}

?>



<div class="container mt-2 ">

  <h3>Modier l'Inter : <?= $article->getTitle() ?></h3>
  <form method="post">
    <label for="form-label">Lieu</label>
    <input type="text" name="title" id="title" class="form-control" value="<?= $article->getTitle(); ?>">


    <?php if ($article->getPrioritaire() == 1) {
      $prioritaire = "checked";
    ?>

      <div class="m-3 form-check form-check-inline">
        <label class="form-check-label" for="prioritaire">Prioritaire</label>
        <input type="checkbox" class="form-check-input" id="prioritaire" name="prioritaire" checked=<?= $prioritaire ?>>
      </div>

    <?php
    }

    ?>
    <?php if ($article->getAnimaux() == 1) {
      $animaux = "checked";
    ?>

      <div class="m-3 form-check form-check-inline">
        <label class="form-check-label" for="animaux">Animaux</label>
        <input type="checkbox" class="form-check-input" id="animaux" name="animaux" checked=<?= $prioritaire ?>>
      </div>

    <?php
    }

    ?>
    <br>
    <label for="content">Intervention</label>
    <textarea type="text" name="content" id="content" class="form-control" value=""><?= $article->getContent(); ?></textarea>

    <div class="mb-3">
      <label for="post" class="form-label">Post</label>
      <select id="post" class="form-select" name="post">
        <?php
        // create a array of all post the take out the good loop tu create enum 
        $posts = [
          'Réception', 'Direction', 'Gouvernance', 'Technique'
        ];
        $notSelectedPost = [];
        $selectedPost;
        foreach ($posts as $post) {
          if ($article->getPost() != $post) {
            array_push($notSelectedPost, $post);
          } else {
            $selectedPost = $post;
          }
        }
        foreach ($notSelectedPost as $optionPost) {
          echo "<option value='$optionPost'>$optionPost</option>";
        }
        echo "<option value='Réception' selected >$selectedPost</option>";
        ?>

      </select>
    </div>

    <div class="mb-3">
      <label for="statut" class="form-label">Statut Inter </label>
      <select id="statut" class="form-select" name="statut">

        <?php
        // create a array of all statut the take out the good loop tu create enum 
        $statuts =  ['Demande', 'EnCour', 'Attente', 'AComander', 'EnCommande', 'VTA', 'Prio', 'Départ', 'Résolue'];
        $notSelectedStatut = [];
        $selectedStatut;

        foreach ($statuts as $statut) {
          if ($article->getStatut() != $statut) {
            array_push($notSelectedStatut, $statut);
          } else {
            $selectedStatut = $statut;
          }
        }
        foreach ($notSelectedStatut  as $optionPost) {
          echo "<option value='$optionPost'>$optionPost</option>";
        }
        echo "<option value='Réception'selected >$selectedStatut</option>";
        ?>
      </select>
    </div>
    <a href="./deleteArticle.php?id=<?= $article->getId() ?>" class=" btn btn-danger"><i class="fas fa-trash-alt"></i></a>
    <input type="submit" value="Modifier" class="btn btn-warning mt-2">
  </form>


  <?php


  require 'footer.php';
  ?>