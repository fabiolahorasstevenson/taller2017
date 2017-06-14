<?php

namespace EspectaculosBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tipos_espectaculos")
 */
class Tipo
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
  protected $nombre;

    
  // Generar los getters y setters

  // Getters 

  public function getId()
  {
  	return $this->id;
  }
  	
  public function getNombre()
  {
  	return $this->nombre;	
  }
  	
  // Setters

  public function setNombre($aNombre)
  {
  	$this->nombre = $aNombre;
  }
  
  public function __toString ()
  {
    return $this->getNombre();
  }	
}