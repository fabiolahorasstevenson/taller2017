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
        $tipoe =  $this->getReference('show');

		$Espectaculo = new Espectaculo();
		$Espectaculo->setSala($sala);
		$Espectaculo->setNombre('Noche de flamenco');
		$Espectaculo->setDescripcion('Un espectáculo que muestra lo mejor del flamenco');
		$Espectaculo->setFechaInicio(new \DateTime('2017-05-25'));
		$Espectaculo->setFechaFin(new \DateTime('2017-05-30'));
		$Espectaculo->setImagen('http://www.carmenmota.com/wp-content/themes/carmenMota/images/espectaculos.jpg');
		$Espectaculo->setMonto(100);
		$Espectaculo->setTipoEspectaculo($tipoe);

		$manager->persist($Espectaculo);
		$manager->flush();

		$Espectaculo = new Espectaculo();
		$Espectaculo->setSala($sala);
		$Espectaculo->setNombre('Show de delfines');
		$Espectaculo->setDescripcion('Un imperdible show con los delfines más adorables y tiernos');
		$Espectaculo->setFechaInicio(new \DateTime('2017-05-25'));
		$Espectaculo->setFechaFin(new \DateTime('2017-05-30'));
		$Espectaculo->setImagen('http://sociedadtrespuntocero.com/wp-content/uploads/2014/06/Espect%C3%A1culo-de-delfines-en-Selwo-Marina.jpg');
		$Espectaculo->setMonto(150);
		$Espectaculo->setTipoEspectaculo($tipoe);
		$manager->persist($Espectaculo);
		$manager->flush();
	
		$Espectaculo = new Espectaculo();
		$Espectaculo->setSala($sala);
		$Espectaculo->setNombre('La nariz roja');
		$Espectaculo->setDescripcion('Un imperdible show de circo y mucha magia para grandes y chicos.');
		$Espectaculo->setFechaInicio(new \DateTime('2017-05-25'));
		$Espectaculo->setFechaFin(new \DateTime('2017-05-30'));
		$Espectaculo->setImagen('http://3.bp.blogspot.com/-ioooLVKyKOg/UGiY0tbmirI/AAAAAAAAMY4/Q6micwwyJvw/s1600/Espectaculos.png');
		$Espectaculo->setMonto(150);
		$Espectaculo->setTipoEspectaculo($tipoe);
		$manager->persist($Espectaculo);
		$manager->flush();

		$Espectaculo = new Espectaculo();
		$Espectaculo->setSala($sala);
		$Espectaculo->setNombre('Topa - Junior Express');
		$Espectaculo->setDescripcion('Un imperdible show para los niños que disfrutan de Topa y sus amigos.');
		$Espectaculo->setFechaInicio(new \DateTime('2017-05-25'));
		$Espectaculo->setFechaFin(new \DateTime('2017-05-30'));
		$Espectaculo->setImagen('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRX19LvOd7KVHnwt68OkEjNv1ZIMuHOyWvTJ01J9aGskh8qeA5P9g');
		$Espectaculo->setMonto(150);
		$Espectaculo->setTipoEspectaculo($tipoe);
		$manager->persist($Espectaculo);
		$manager->flush();
	}

	public function getOrder()
    {
        return 3;
    }

}