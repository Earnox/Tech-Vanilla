<?php class ArticlesManager extends BaseManager
{

  public function timeUptadet()
  {
    date("Y-m-d H:i:s");
  }
  public function create(Article $article)
  {

    $req = $this->pdo->prepare("INSERT INTO `article`(title,content, post, prioritaire, animaux ) VALUES (:title, :content, :post, :prioritaire, :animaux)");
    $req->bindValue(":title", $article->getTitle(), PDO::PARAM_STR);
    $req->bindValue(":content", $article->getContent(), PDO::PARAM_STR);
    // $req->bindParam(":statut", $article->getStatut(), PDO::PARAM_STR);
    if ($article->getPrioritaire()) {
      $req->bindValue(":prioritaire", $article->getPrioritaire(), PDO::PARAM_BOOL);
    } else {
      $req->bindValue(":prioritaire", null, PDO::PARAM_BOOL);
    }

    if ($article->getAnimaux()) {
      $req->bindValue(":animaux", $article->getAnimaux(), PDO::PARAM_BOOL);
    } else {
      // $req->bindValue(":animaux", null, PDO::PARAM_BOOL);
      $req->bindValue(":animaux", $article->getAnimaux(), PDO::PARAM_BOOL);
    }
    // $req->bindValue(":animaux", $article->getPrioritaire(), PDO::PARAM_BOOL);

    $req->bindValue(":post", $article->getPost(), PDO::PARAM_STR);

    $req->execute();
  }

  public function update(Article $article)
  {
    $req = $this->pdo->prepare("UPDATE `article` SET title = :title, content = :content , post = :post ,animaux = :animaux , prioritaire = :prioritaire, statut = :statut WHERE id = :id");
    $req->bindValue(":title", $article->getTitle(), PDO::PARAM_STR);
    $req->bindValue(":content", $article->getContent(), PDO::PARAM_STR);
    // $req->bindParam(":statut", $article->getStatut(), PDO::PARAM_STR);
    if ($article->getPrioritaire()) {
      $req->bindValue(":prioritaire", $article->getPrioritaire(), PDO::PARAM_BOOL);
    } else {
      $req->bindValue(":prioritaire", null, PDO::PARAM_BOOL);
    }

    if ($article->getAnimaux()) {
      $req->bindValue(":animaux", $article->getAnimaux(), PDO::PARAM_BOOL);
    } else {
      // $req->bindValue(":animaux", null, PDO::PARAM_BOOL);
      $req->bindValue(":animaux", $article->getAnimaux(), PDO::PARAM_BOOL);
    }
    // $req->bindValue(":animaux", $article->getPrioritaire(), PDO::PARAM_BOOL);

    $req->bindValue(":post", $article->getPost(), PDO::PARAM_STR);
    $req->bindValue(":statut", $article->getStatut(), PDO::PARAM_STR);

    $req->bindValue(":id", $article->getId(), PDO::PARAM_INT);


    $req->execute();
  }
  public function delete(int $id)
  {

    $req = $this->pdo->prepare("DELETE FROM `article` WHERE id = :id");
    $req->bindParam(":id", $id, PDO::PARAM_INT);
    $req->execute();
  }
  public function getById(int $id)
  {

    $req = $this->pdo->query("SELECT * FROM `article` WHERE id = $id");

    /*$req->bindValue(":id", $id, PDO::PARAM_INT);*/
    $data = $req->fetch();

    return new Article($data);
  }
  public function getall()
  {
    $req = $this->pdo->query("SELECT *  FROM `article` ORDER BY id DESC");


    $articles = array();

    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
      $articles[] = new Article($data);
    }

    return $articles;
  }
}
