<?php
class BaseManager
{
  protected $pdo;

  public function __construct()
  {

    $dbName = "tech_vannilla";
    $this->setPdo(new PDO("mysql:host=localhost:3307;dbname=$dbName", 'root', ''));


    $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $cleardb_server = $cleardb_url["host"];
    $cleardb_username = $cleardb_url["user"];
    $cleardb_password = $cleardb_url["pass"];
    $cleardb_db = substr($cleardb_url["path"], 1);
    $active_group = 'default';
    $query_builder = TRUE;
    // Connect to DB
    $this->pdo = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
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
}
