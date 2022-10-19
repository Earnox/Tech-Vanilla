<?php class ArticlesManager
{
  private $pdo;

  public function __construct()
  {

    $dbName = "tech_vannilla";
    $this->setPdo(new PDO("mysql:host=localhost:3307;dbname=$dbName", 'root', ''));
  }

  /**
   * Get the value of pdo
   */
  public function getPdo()
  {
    return $this->pdo;
  }

  /**
   * Set the value of pdo
   *
   * @return  self
   */
  public function setPdo($pdo)
  {
    $this->pdo = $pdo;

    return $this;
  }
  public function create(Article $article)
  {
    $req = $this->pdo->prepare("INSERT INTO `articles`(title,content) VALUES (:title, :content)");
    $req->binValue(":title", $article->getTitle(), PDO::PARAM_STR);
    $req->binValue(":content", $article->getContent(), PDO::PARAM_STR);
    $req->execute();
  }

  public function update(Article $article)
  {
    $req = $this->pdo->prepare("UPDATE `article` SET title = :title, content = :content WHERE id = :id");
    $req->binValue(":title", $article->getTitle(), PDO::PARAM_STR);
    $req->binValue(":content", $article->getContent(), PDO::PARAM_STR);
    $req->binValue("id", $article->getId(), PDO::PARAM_INT);
    $req->execute();
  }
  public function delete(int  $id)
  {
    $req = $this->pdo->prepare("DELETE FROM `article` WHERE id = :id");

    $req->binValue("id", $id, PDO::PARAM_INT);
    $req->execute();
  }
  public function getById(int $id)
  {
    $req = $this->pdo->prepare("SELECT *  FROM `article` WHERE id = :id");
    $req->binValue(":id", $id, PDO::PARAM_INT);
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
