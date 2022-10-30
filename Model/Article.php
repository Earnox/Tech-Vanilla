<?php

class Article extends EntityBase
{

  private $title;
  private $content;
  private $statut;
  private $startDate;
  private $prioritaire;
  private $post;
  private $animaux;
  private $dateRealiser;
  private $img;
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
      $this->title = $title;
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
      $this->content = $content;

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

  /**
   * Get the value of prioritaire
   */
  public function getPrioritaire()
  {
    return $this->prioritaire;
  }

  /**
   * Set the value of prioritaire
   *
   * @return  self
   */
  public function setPrioritaire($prioritaire)
  {
    if (isset($prioritaire)) {
      $prioritaire = true;
    }
    $this->prioritaire = $prioritaire;

    return $this;
  }

  /**
   * Get the value of post
   */
  public function getPost()
  {
    return $this->post;
  }

  /**
   * Set the value of post
   *
   * @return  self
   */
  public function setPost($post)
  {
    $this->post = $post;

    return $this;
  }




  /**
   * Get the value of dateRealiser
   */
  public function getDateRealiser()
  {
    return $this->dateRealiser;
  }

  /**
   * Set the value of dateRealiser
   *
   * @return  self
   */
  public function setDateRealiser($dateRealiser)
  {

    $this->dateRealiser = $dateRealiser;

    return $this;
  }

  /**
   * Get the value of img
   */
  public function getImg()
  {
    return $this->img;
  }

  /**
   * Set the value of img
   *
   * @return  self
   */
  public function setImg($img)
  {
    $this->img = $img;

    return $this;
  }


  /**
   * Get the value of animaux
   */
  public function getAnimaux()
  {
    return $this->animaux;
  }

  /**
   * Set the value of animaux
   *
   * @return  self
   */
  public function setAnimaux($animaux)
  {

    if (isset($animaux)) {
      $animaux = true;
    }
    $this->animaux = $animaux;

    return $this;
  }
}
