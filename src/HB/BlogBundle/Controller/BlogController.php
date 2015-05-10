<?php

namespace HB\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use HB\BlogBundle\Entity\Article;

class BlogController extends Controller {

    /**
     * Liste tous les articles
     *
     * @Route("/", name="blog_index")
     * @Route("/", name="home")
     * @Route("/page/{page}", name="blog_index_page")
     * @Template()
     */
    public function indexAction($page = 1) {

        // on récupère l'entity manager à l'aide du service Doctrine
        $em = $this->getDoctrine()->getManager();

        $repo = $em->getRepository('HBBlogBundle:Article');
        // on récupère le repository de Article et on lui demande 
        //  les articles de la page d'acceuil

        $articles = $repo->getHomepageArticles();
        // on recupere le service paginator
        $paginator = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
                $articles, //list des article ou query
                $page, //numero de page
                10   //nombre element par page
        );

        $pagination->setUsedRoute("blog_index_page");
        return array(
            'pagination' => $pagination
        );
    }

    /**
     * affiche un objet Article
     *
     * @Route("/blog/{slug}", name="blog_article_slug")
     * 
     * @Template()
     */
    public function showAction(Article $article) {
        
        return array(
            'article' => $article
        );
    }

}
