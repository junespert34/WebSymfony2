<?php

namespace HB\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


/**
 * user controller
 * 
 * @Route("/user")
 */
class UserController extends Controller
{

    /**
     * Liste tous les users
     *
     * @Route("/", name="user")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        // on récupère l'entity manager à l'aide du service Doctrine
        $em = $this->getDoctrine()->getManager();

        // on récupère le repository de Article et on lui demande 
        // tous les articles
        $entities = $em->getRepository('HBUserBundle:User')->findAll();

        // on transmet la liste d'article au template en la nommant entities
        return array(
            'entities' => $entities,
        );
    }
    
}
