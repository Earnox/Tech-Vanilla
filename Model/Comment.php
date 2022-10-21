<?php

class Comment extends EntityBase
{

  private $content;
  private $article_id;

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
   * Get the value of article_id
   */
  public function getArticle_id()
  {
    return $this->article_id;
  }

  /**
   * Set the value of article_id
   *
   * @return  self
   */
  public function setArticle_id($article_id)
  {
    $this->article_id = $article_id;

    return $this;
  }
}
