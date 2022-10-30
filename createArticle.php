<?php require("./header.php");
$manager = new ArticlesManager();

if ($_POST) {

  $article = new Article($_POST);
  $manager->create($article);

  echo "<script>
    window.location = './index.php'
  </script>";
}

?>
<div class="container mt-2 ">

  <h3>Nouvelle Inter</h3>
  <form method="post">
    <label for="form-label">Lieu</label>
    <input type="text" name="title" id="title" class="form-control" value="">


    <div class="forCheckBox">
      <div class="m-3 form-check form-check-inline">
        <input type="checkbox" class="form-check-input" id="prioritaire" name="prioritaire">
        <label class="form-check-label" for="prioritaire">prioritaire</label>
      </div>
      <div class="m-3 form-check form-check-inline">
        <input type="checkbox" class="form-check-input" id="animaux" name="animaux">
        <label class="form-check-label" for="animaux">animaux </label>
      </div>
    </div>

    <label for="form-label">Intervention</label>
    <textarea type="text" name="content" id="content" class="form-control"></textarea>

    <div class="mb-3">
      <label for="post" class="form-label">post</label>
      <select id="post" class="form-select" name="post">
        <option>Réception</option>
        <option>Direction</option>
        <option>Gouvernance</option>
        <option>Technique</option>
      </select>
    </div>
    <!-- <div class="mb-3">
      <label for="statut" class="form-label">statut</label>
      <select id="statut" class="form-select" name="statut">
        <option>Demande</option>
        <option>EnCour</option>
        <option>Gouvernance</option>
        <option>Technique</option>
      </select>
    </div> -->

    <input type="submit" value="post" class="btn btn-warning mt-2">

  </form>

</div>
<?php

require 'footer.php';
?>