<?php
class BaseManager
{
  protected $pdo;

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
}
