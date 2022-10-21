<?php

$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"], 1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
class CommentsManager extends BaseManager
{
  public function create(Comment $comment)
  {
    $req = $this->conn->prepare("INSERT INTO `commentaire`(content,article_id) VALUES (:content, :article_id)");
    $req->bindValue(":content", $comment->getContent(), PDO::PARAM_STR);
    $req->bindValue(":article_id", $comment->getArticle_id(), PDO::PARAM_INT);
    $req->execute();
  }

  public function update(Comment $comment)
  {
    $req = $this->pdo->prepare("UPDATE `commentaire` SET content = :content WHERE id = :id");

    $req->bindParam(":content", $comment->getContent(), PDO::PARAM_STR);
    $req->bindParam(":id", $comment->getArticle_id(), PDO::PARAM_INT);


    $req->execute();
  }
  public function delete(int $id)
  {

    $req = $this->pdo->prepare("DELETE FROM `commentaire` WHERE id = :id");
    $req->bindParam(":id", $id, PDO::PARAM_INT);
    $req->execute();
  }
  public function getById(int $id)
  {
    $req = $this->pdo->query("SELECT * FROM `commentaire` WHERE id = $id");
    // $req->bindParam(":id", $id, PDO::PARAM_INT);
    $data = $req->fetch();

    return new Comment($data);
  }
  public function getallByArticleID(int $articleId)
  {

    $req = $this->pdo->prepare("SELECT * FROM `commentaire` WHERE article_id = :article_id ORDER BY id DESC");
    $req->bindValue(":article_id", $articleId, PDO::PARAM_INT);
    $req->execute();
    $datas = $req->fetchAll();
    $comments = array();

    foreach ($datas as $data) {

      $comments[] = new Comment($data);
    }

    return $comments;
  }
}
