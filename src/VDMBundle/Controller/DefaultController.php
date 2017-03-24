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
        return $this->redirectToRoute('homepage');
    }

    /**
     * Render homepage
     *
     */
    public function homepageAction(){
        $em = $this->getDoctrine()->getManager();
        $currentUser = $this->get('security.token_storage')->getToken()->getUser();

        $articles = $em->getRepository('VDMBundle:Article')->findBy(
            array(),
            array(),
            4
        );
        $id_like_user = array();
        foreach ($articles as $article) {
            foreach ($article->getUsers() as $user) {
                $id_like_user[] = $user->getId();
            }
        }

        $nbLike = count($id_like_user);

        if ($currentUser != "anon."){
            if (in_array($currentUser->getId(), $id_like_user)){
                $like_button = false;
            }
            else{
                $like_button = true;
            }
        }
        else{
            $like_button = true;
        }


        $categs = $em->getRepository('VDMBundle:Categorie')->findAll();
        return $this->render('@VDM/Default/index.html.twig', array(
            'articles' => $articles,
            'categories' => $categs,
            'like_button' => $like_button,
            'nblike' => $nbLike
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
