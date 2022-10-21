<?php
class EntityBase
{
  protected $id;


  public function __construct(array $data)
  {
    $this->hydrate($data);
  }
  public function hydrate(array $data): void
  {
    foreach ($data as $key => $value) {
      $method = 'set' . ucfirst($key);
      if (method_exists($this, $method)) {
        $this->$method($value);
      }
    }
  }

  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */
  public function setId($id)
  {
    if (is_int($id)) {

      $this->id = $id;
    }

    return $this;
  }
}
