<?php require("./header.php");
$manager = new ArticlesManager();
$article = $manager->getById($_GET['id']);

if ($_POST) {
  $article->hydrate($_POST);
  $manager->update($article);
  echo "<script>
  window.location = './index.php'
</script>";
}

?>
<div class="container mt-2 ">

  <h3>modier l'article <?= $article->getTitle() ?></h3>
  <form method="post">
    <label for="form-label">titre</label>
    <input type="text" name="title" id="title" class="form-control" value="<?= $article->getTitle() ?>">
    <label for="form-label">contenu</label>
    <textarea type="text" name="content" id="content" class="form-control"> <?= $article->getContent() ?></textarea>
    <textarea type="text" name="content" id="content" class="form-control"> <?= $article->getStatut() ?></textarea>
    <input type="submit" value="Modifier" class="btn btn-warning mt-2">
  </form>

</div>