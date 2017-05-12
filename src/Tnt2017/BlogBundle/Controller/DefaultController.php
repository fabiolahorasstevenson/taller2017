<?php

namespace Tnt2017\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/posts")
     */
    public function indexAction()
    {
        return $this->render('Tnt2017BlogBundle:Default:index.html.twig', array(
        	'posts' => $this->generarArray()
        ));
    }

    private function generarArray()
    {
    	return array(
			array(	'id' => 0, 
					'title' => 'Imágenes lindas', 
					'contenido' => 'Vivamus efficitur velit at sodales volutpat. Nam id arcu eget urna fermentum consequat. Curabitur et aliquam urna. Pellentesque dignissim, augue ac venenatis malesuada, sapien metus dignissim odio, quis tempus nulla eros dictum ligula. Nunc ipsum lorem, tristique vitae augue in, ullamcorper lacinia nulla. Praesent vitae magna magna. Vivamus viverra est quis urna tincidunt convallis. Ut in nibh sapien.
						Aenean eget tempor est, ut ullamcorper tellus. Vivamus mollis consectetur fermentum. Quisque sed est sapien. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus sagittis sed neque vel lacinia.',
						'imagen' => 'http://www.arqhys.com/wp-content/fotos/2011/12/El-jardin-mas-hermoso-del-mundo.jpg'),
	        array(	'id' => 1, 
	        		'title' => 'Frases para motivar',
	        		'contenido' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum suscipit scelerisque quam, id laoreet dolor. Sed in eros a dui porta ultricies. Sed non ipsum risus. Mauris scelerisque tempor quam nec euismod. Phasellus ac pharetra dolor. Quisque nec est auctor, sodales nibh et, faucibus mauris. Nunc id arcu quis ante consectetur feugiat. 
	        			Vivamus efficitur velit at sodales volutpat. Nam id arcu eget urna fermentum consequat. Curabitur et aliquam urna. Pellentesque dignissim, augue ac venenatis malesuada, sapien metus dignissim odio, quis tempus nulla eros dictum ligula. Nunc ipsum lorem, tristique vitae augue in, ullamcorper lacinia nulla. Praesent vitae magna magna. Vivamus viverra est quis urna tincidunt convallis. Ut in nibh sapien.',
					'imagen' => 'https://s-media-cache-ak0.pinimg.com/736x/6a/cd/aa/6acdaa9e69856c78910a433ecdc72f48.jpg')
	       );
	}

    /**
     * @Route("/post/{id}", name="show_post")
     */
    public function showAction ($id)
    {
    	$posts = $this-> generarArray();

    	return $this->render('Tnt2017BlogBundle:Default:show.html.twig',array(
    		'post' => $posts[$id]
    	));
    }

}