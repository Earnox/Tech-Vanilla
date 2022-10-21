<?php require("./header.php");
$atriclemanager = new ArticlesManager();
$id = intval($_GET['id']);
$article = $atriclemanager->getById($id);

$commentManager = new CommentsManager();
$comments = $commentManager->getallByArticleID($id);
if ($_POST) {
  $comment = new Comment(
    [
      "content" => $_POST["content"],
      "article_id" => $_GET["id"]
    ]
  );
  $commentManager->create($comment);
  echo "
  <script>
  window.location.href ='./readArticle.php?id={$id}'
  </script>";
}
?>

<div class="container mt-2">
  <h3><?= $article->getTitle() ?></h3>
  <div class="card" style="width: 18rem;">
    <!-- <img src="..." class="card-img-top" alt="..."> -->
    <div class="card-body">
      <h5 class="card-title"><?= $article->getTitle() ?></h5>
      <p class="card-text"><?= $article->getContent() ?> </p>

      <a href="./uptateArticle.php?id=<?= $article->getId() ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
      <a href="./deleteArticle.php?id=<?= $article->getId() ?>" class=" btn btn-danger"><i class="fas fa-trash-alt"></i></a>

    </div>

  </div>
  <div class="mt-3">
    <h3>commentaire</h3>
    <form action="" method="post">
      <textarea name="content" id="content" placeholder="Votre commentaire" class="form-control"></textarea>
      <input type="submit" value="Poster" class="btn btn-danger mt-2">
    </form>
  </div>
  <div class="d-flex dlex-wrap mt-3">
    <?php foreach ($comments as $comment) : ?>
      <div class="card" style="width: 18rem;">
        <div class="card-body me-2 mt-2">
          <p class="card-text"><?= $comment->getContent() ?> </p>

          <a href="./uptateComment.php?id=<?= $comment->getId() ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
          <a href="./deleteComment.php?id=<?= $comment->getId() ?>" class=" btn btn-danger"><i class="fas fa-trash-alt"></i></a>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</div>

</body>

</html>