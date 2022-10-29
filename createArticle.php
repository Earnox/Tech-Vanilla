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

  <h3>nouvelle article </h3>
  <form method="post">
    <label for="form-label">titre</label>
    <input type="text" name="title" id="title" class="form-control" value="">
    <label for="form-label">contenu</label>
    <textarea type="text" name="content" id="content" class="form-control"></textarea>
    <input type="submit" value="post" class="btn btn-warning mt-2">
  </form>

</div>