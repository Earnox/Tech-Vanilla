<?php

class Article extends EntityBase
{

  private $title;
  private $content;
  private $statut;
  private $startDate;
  /**
   * Get the value of title
   */
  public function getTitle()
  {
    return $this->title;
  }

  /**
   * Set the value of title
   *
   * @return  self
   */
  public function setTitle($title)
  {
    if (is_string($title) && strlen($title) > 1 && strlen($title) < 80) {
      $this->title = htmlspecialchars($title);
    }

    return $this;
  }

  /**
   * Get the value of content
   */
  public function getContent()
  {
    return $this->content;
  }

  /**
   * Set the value of content
   *
   * @return  self
   */
  public function setContent($content)
  {
    if (is_string($content) && strlen($content) > 1) {
      $this->content = htmlspecialchars($content);

      return $this;
    }
  }



  /**
   * Get the value of startDate
   */
  public function getStartDate()
  {
    return $this->startDate;
  }

  /**
   * Set the value of startDate
   *
   * @return  self
   */
  public function setStartDate($startDate)
  {
    $this->startDate = $startDate;

    return $this;
  }

  /**
   * Get the value of statut
   */
  public function getStatut()
  {
    return $this->statut;
  }

  /**
   * Set the value of statut
   *
   * @return  self
   */
  public function setStatut($statut)
  {
    $this->statut = $statut;

    return $this;
  }
}
