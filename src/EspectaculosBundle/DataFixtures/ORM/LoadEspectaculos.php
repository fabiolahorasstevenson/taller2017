<?php
namespace EspectaculosBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use EspectaculosBundle\Entity\Espectaculo;

class LoadEspectaculos extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)
	{
        $sala  =  $this->getReference('nombre-sala1');
        $tipoe =  $this->getReference('cine');

		$Espectaculo = new Espectaculo();
		$Espectaculo->setSala($sala);
		$Espectaculo->setNombre('Espectáculo 1');
		$Espectaculo->setDescripcion('Muy lindo espectáculo');
		$Espectaculo->setFechaInicio(new \DateTime('2017-05-25'));
		$Espectaculo->setFechaFin(new \DateTime('2017-05-30'));
		$Espectaculo->setImagen('http://newmat.com/typo3temp/pics/04fb249878.jpg');
		$Espectaculo->setMonto(10);
		$Espectaculo->setTipoEspectaculo($tipoe);

		$manager->persist($Espectaculo);
		$manager->flush();

		$Espectaculo = new Espectaculo();
		$Espectaculo->setSala($sala);
		$Espectaculo->setNombre('Espectáculo 2');
		$Espectaculo->setDescripcion('Muy lindo espectáculo');
		$Espectaculo->setFechaInicio(new \DateTime('2017-05-25'));
		$Espectaculo->setFechaFin(new \DateTime('2017-05-30'));
		$Espectaculo->setImagen('http://newmat.com/typo3temp/pics/04fb249878.jpg');
		$Espectaculo->setMonto(10);
		$Espectaculo->setTipoEspectaculo($tipoe);
		$manager->persist($Espectaculo);
		$manager->flush();
	
	}

	public function getOrder()
    {
        return 3;
    }

}