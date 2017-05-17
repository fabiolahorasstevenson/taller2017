<?php

namespace EspectaculosBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="sala")
 */

class Sala
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
   * @ORM\Column(type="text") 
   */
  protected $direccion;

  /**
   * @ORM\Column(type="string", length=100)
   */
  protected $imagen;

  /**
   * @ORM\Column(type="integer")
   */
  protected $longitud;

  /**
   * @ORM\Column(type="integer")
   */
  protected $latitud;
  
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

   public function getDireccion()
  {
    return $this->direccion;
  }
    
  public function getImagen()
  {
  	return $this->imagen;
  }	

  public function getLongitud()
  {
    return $this->longitud;
  } 

  public function getLatitud()
  {
    return $this->latitud;
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

  public function setDireccion($aDireccion) 
  {
    $this->direccion = $aDireccion;
  }

  public function setImagen($aImagen)
  {
  	$this->imagen = $aImagen;
  }

  public function setLongitud($aLongitud)
  {
    $this->longitud = $aLongitud;
  }
    
    public function setLatitud($aLatitud)
  {
    $this->latitud = $aLatitud;
  }
    
  }