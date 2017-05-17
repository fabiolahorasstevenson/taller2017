<?php
namespace Tnt2017\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Tnt2017\BlogBundle\Entity\Post;

class LoadPost implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$Post = new Post();
		$Post->setTitle('El Rey Arturo');
		$Post->setContent('Cuando asesinan al padre de Arturo (entonces un bebé), su tío Vortigern usurpa el trono. Arturo –despojado de su derecho a la corona y con una idea muy vaga de quien es él realmente– crece en circunstancias adversas, en los oscuros callejones de la ciudad. Cuando se ve obligado a extraer la espada de la piedra, su vida cambia drásticamente y se enfrenta a su deber de asumir su verdadero legado, le guste o no.');
		$Post->setImage('http://www.cinesunstar.com/images/2017/05/10/elreyarturo_poster.jpg');

		$manager->persist($Post);
		$manager->flush();

		$Post = new Post();
		$Post->setTitle('Guardianes de la Galaxia 2');
		$Post->setContent('Ambientada en el nuevo contexto sonoro de “Awesome Mixtape #2”, continúa las aventuras del equipo en su travesía por los confines del cosmos. Los Guardianes deberán luchar para mantener unida a su nueva familia mientras intentan desentrañar el misterio del verdadero linaje de Peter Quill.');
		$Post->setImage('http://www.cinesunstar.com/images/2017/05/03/guardianesdelagalaxia2_poster.jpg');

		$manager->persist($Post);
		$manager->flush();

		$Post = new Post();
		$Post->setTitle('Rápidos y Furiosos 8');
		$Post->setContent('Justo cuando Dom y Letty celebran su luna de miel, Brian y Mia se han retirado del juego y el resto del equipo se ha desintegrado en busca de una vida común y corriente; una misteriosa mujer intentará seducir a Dom para convencerlo de regresar a la vida criminal que tanto lo acecha, traicionando a quienes lo rodean y enfrentándose a retos nunca antes vistos. Desde la costa cubana pasando por las calles de Nueva York y hasta el helado Ártico, el equipo deberá cruzar el mundo para detener a una anarquista y evitar un desastre mundial trayendo de vuelta a casa al hombre que los convirtió en una familia.');
		$Post->setImage('http://www.cinesunstar.com/images/2017/04/11/rapidoyfurioso8_poster.jpg');

		$manager->persist($Post);
		$manager->flush();

		$Post = new Post();
		$Post->setTitle('Los padecientes');
		$Post->setContent('Pablo Rouviot, un reconocido psicoanalista, recibe a Paula Vanussi, una joven que le formula un pedido bastante particular: el cuerpo de su padre, un poderoso empresario, fue encontrado asesinado a la orillas de un río, y su hermano, Javier, 22, un joven con graves problemas psicológicos, está acusado de haber sido el responsable del crimen.');
		$Post->setImage('http://www.cinesunstar.com/images/2017/04/25/lospadecientes_poster.jpg');

		$manager->persist($Post);
		$manager->flush();

		$Post = new Post();
		$Post->setTitle('Jefe en pañales');
		$Post->setContent('Un bebé que lleva traje y maletín, se une a su hermano de 7 años, para detener el complot planeado por el CEO de la compañia Puppy Co. ');
		$Post->setImage('http://www.cinesunstar.com/images/2017/04/11/jefeenpaales_poster.jpg');

		$manager->persist($Post);
		$manager->flush();
	}
}