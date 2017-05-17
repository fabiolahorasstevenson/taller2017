<?php

namespace Tnt2017\BlogBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="post")
 */
class Post
{
  /**
   * @ORM\id 
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
  */ 
  protected $id;
  
  /**
   * @ORM\Column(type="string", length=100) 
   */
  protected $title;

  /**
   * @ORM\Column(type="text") 
   */
  protected $content;

  /**
   * @ORM\Column(type="string", length=100)
   */
  protected $image;
  
  // Generar los getters y setters
  public function getId()
  {
  	return $this->id;
  }
  	
  public function getTitle()
  {
  	return $this->title;	
  }
  	
  public function getContent()
  {
  	return $this->content;
  }
  
  public function getImage()
  {
  	return $this->image;
  }	

  public function setTitle($aTitle)
  {
  	$this->title = $aTitle;
  }
  	
  public function setContent($aContent) 
  {
  	$this->content = $aContent;
  }

  public function setImage($aImage)
  {
  	$this->image = $aImage;
  }
  	
}