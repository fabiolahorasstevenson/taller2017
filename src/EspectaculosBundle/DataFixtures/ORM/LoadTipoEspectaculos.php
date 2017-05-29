<?php
namespace EspectaculosBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use EspectaculosBundle\Entity\Tipo;

class LoadTipoEspectaculos extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$Tipo = new Tipo();
		$Tipo->setNombre('Cine');
		
		$manager->persist($Tipo);
		$manager->flush();

		$Tipo = new Tipo();
		$Tipo->setNombre('Teatro');
		
		$manager->persist($Tipo);
		$manager->flush();
		
		$Tipo = new Tipo();
		$Tipo->setNombre('Ópera');
		
		$manager->persist($Tipo);
		$manager->flush();

		$this->addReference('show',$Tipo);

	}

	public function getOrder()
    {
        return 2;
    }

}