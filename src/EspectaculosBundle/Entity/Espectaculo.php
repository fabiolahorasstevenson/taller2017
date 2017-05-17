<?php

namespace EspectaculosBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="espectaculos")
 */

class Espectaculo
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

  /**
   * @ORM\Column(type="text") 
   */
  protected $descripcion;

   /**
   * @ORM\Column(type="date") 
   */
  protected $fechaInicio;

  /**
   * @ORM\Column(type="date")
   */
  protected $fechaFin;

  /**
   * @ORM\Column(type="string", length=100) 
   */
  protected $imagen;

  /**
   * @ORM\Column(type="integer")
   */
  protected $monto;

  /**
   * @ORM\ManyToOne(targetEntity="Sala")
   */
  protected $sala;

  /**
   * @ORM\ManyToOne(targetEntity="Tipo")
   */
  protected $tipoespectaculo;
  
  // Generar los getters y setters

  // Getter 

  public function getId()
  {
  	return $this->id;
  }
  	
  public function getNombre()
  {
  	return $this->nombre;	
  }
  	
  public function getDescripcion()
  {
  	return $this->descripcion;
  }

  public function getFechaInicio()
  {
    return $this->fechaInicio;
  }

  public function getFechaFin()
  {
    return $this->fechaFin;
  }
    
  public function getImagen()
  {
  	return $this->imagen;
  }	

  public function getMonto()
  {
    return $this->monto;
  } 

  public function getSala()
  {
    return $this->sala;
  } 

  public function getTipoEspectaculo()
  {
    return $this->tipoespectaculo;
  } 

  // Setters 

  public function setNombre($aNombre)
  {
  	$this->nombre = $aNombre;
  }
  	
  public function setDescripcion($aDescripcion) 
  {
  	$this->descripcion = $aDescripcion;
  }

  public function setFechaInicio($aFechaInicio) 
  {
    $this->fechaInicio = $aFechaInicio;
  }

  public function setFechaFin($aFechaFin) 
  {
    $this->fechaFin = $aFechaFin;
  }

  public function setImagen($aImagen)
  {
  	$this->imagen = $aImagen;
  }

  public function setMonto($aMonto)
  {
    $this->monto = $aMonto;
  } 

  public function setSala($aSala)
  {
    $this->sala = $aSala;
  }
    
  public function setTipoEspectaculo($aTipoEspectaculo)
  {
    $this->tipoespectaculo = $aTipoEspectaculo;
  }
}