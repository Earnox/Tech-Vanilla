<?php
include "./inc/config.php";
class BaseManager
{
  public $pdo;

  public function __construct()
  {
    // define('DB_USERNAME', "tech_chatel");
    // define('DB_PASSWORD', "PBLbmwVjWuJZ9ORc");
    // define('DB_HOST', "localhost");
    // define('DB_DATABASE', "tech_chatel");
    // define('DB_PORT', "3306");

    try {
      $pdo = sprintf("mysql:host=%s;dbname=%s;port=%s;", DB_HOST, DB_DATABASE, DB_PORT);
      $this->setPdo(new PDO($pdo, DB_USERNAME, DB_PASSWORD));
    } catch (\Exception $e) {
      echo $e->getMessage();
    }
  }




  /**
   * Get the value of pdo
   */
  public function getPdo()
  {
    return $this->pdo;
    var_dump($this);
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
