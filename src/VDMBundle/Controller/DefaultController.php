<?php

namespace VDMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use UserBundle\Entity\User;
use VDMBundle\Entity\Article;
use VDMBundle\Entity\Categorie;

class DefaultController extends Controller
{
    /**
     * Like action
     *
     */
    public function likeAction(Article $article, User $user){
        $article->addUser($user);
        $user->addArticle($article);

        $em = $this->getDoctrine()->getManager();
        $em->flush();
        return $this->redirectToRoute('_index');
    }

    /**
     * Render homepage
     *
     */
    public function homepageAction(){
        $em = $this->getDoctrine()->getManager();

        $articles = $em->getRepository('VDMBundle:Article')->findBy(
            array(),
            array(),
            4
        );
        $categs = $em->getRepository('VDMBundle:Categorie')->findAll();
        return $this->render('@VDM/Default/index.html.twig', array(
            'articles' => $articles,
            'categories' => $categs
        ));
    }

    /**
     * Render VDM by categ
     *
     */
    public function getVdmByCategAction(Categorie $categorie){
        return $this->render('@VDM/Default/show.html.twig', array(
            'categorie' => $categorie
        ));
    }
}
