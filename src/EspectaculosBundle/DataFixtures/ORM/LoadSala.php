<?php
namespace EspectaculosBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use EspectaculosBundle\Entity\Sala;

class LoadSala extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$Sala = new Sala();
		$Sala->setNombre('Sala 1');
		$Sala->setDescripcion('Sala muy antigua');
		$Sala->setDireccion('Las golondrinas 1234');
		$Sala->setImagen('http://newmat.com/typo3temp/pics/04fb249878.jpg');
		$Sala->setLongitud(10);
		$Sala->setLatitud(20);

		$manager->persist($Sala);
		$manager->flush();

		$Sala = new Sala();
		$Sala->setNombre('Sala 2');
		$Sala->setDescripcion('Sala muy antigua');
		$Sala->setDireccion('Las golondrinas 1234');
		$Sala->setImagen('http://www.cinesunstar.com/images/2017/05/10/elreyarturo_poster.jpg');
		$Sala->setLongitud(10);
		$Sala->setLatitud(20);

		$manager->persist($Sala);
		$manager->flush();

		$Sala = new Sala();
		$Sala->setNombre('Sala 3');
		$Sala->setDescripcion('Sala muy antigua');
		$Sala->setDireccion('Las golondrinas 1234');
		$Sala->setImagen('http://www.cinesunstar.com/images/2017/05/10/elreyarturo_poster.jpg');
		$Sala->setLongitud(10);
		$Sala->setLatitud(20);

		$manager->persist($Sala);
		$manager->flush();

		$Sala = new Sala();
		$Sala->setNombre('Sala 4');
		$Sala->setDescripcion('Sala muy antigua');
		$Sala->setDireccion('Las golondrinas 1234');
		$Sala->setImagen('http://www.cinesunstar.com/images/2017/05/10/elreyarturo_poster.jpg');
		$Sala->setLongitud(10);
		$Sala->setLatitud(20);

		$manager->persist($Sala);
		$manager->flush();

		$Sala = new Sala();
		$Sala->setNombre('Sala 5');
		$Sala->setDescripcion('Sala muy antigua');
		$Sala->setDireccion('Las golondrinas 1234');
		$Sala->setImagen('http://www.cinesunstar.com/images/2017/05/10/elreyarturo_poster.jpg');
		$Sala->setLongitud(10);
		$Sala->setLatitud(20);

		$manager->persist($Sala);
		$manager->flush();

		$this->addReference('nombre-sala1',$Sala);

	}


	public function getOrder()
    {
        return 1;
    }

}