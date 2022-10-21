<?php require("./header.php");



$commentManager = new CommentsManager();
$comment = $commentManager->getById($_GET["id"]);
$articleId = $comment->getArticle_id();
if ($_POST) {
  $comment->hydrate(

    [
      "content" => $_POST["content"],
      "article_id" => $_GET["id"]
    ]
  );

  $commentManager->update($comment);
  echo "
  <script>
  window.location.href ='./readArticle.php?id={$articleId}'
  </script>";
}
?>
<div class="mt-3">
  <h3>modifier commentaire</h3>
  <form action="" method="post">
    <textarea name="content" id="content" placeholder="Votre commentaire" class="form-control"><?= $comment->getContent() ?></textarea>
    <input type="submit" value="Modifier" class="btn btn-warning mt-2">
  </form>
</div>