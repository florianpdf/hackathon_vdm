<?php

namespace VDMBundle\Controller;

use VDMBundle\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Article controller.
 *
 */
class ArticleController extends Controller
{
    /**
     * Lists all article entities.
     *
     */
    public function indexAction()
    {
        // Connexion base de donnée
        $em = $this->getDoctrine()->getManager();

        // Recupération de tous les articles
        $articles = $em->getRepository('VDMBundle:Article')->findAll();

        // Renvoie de la vue
        return $this->render('@VDM/article/index.html.twig', array(
            'articles' => $articles,
        ));
    }

    /**
     * Creates a new article entity.
     *
     */
    public function newAction(Request $request)
    {
        // Instantiation d'un objet Article
        $article = new Article();

        // Création du formulaire
        $form = $this->createForm('VDMBundle\Form\ArticleType', $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $currentUser = $this->get('security.token_storage')->getToken()->getUser();
//            $this->get('app_core.facebook')->poster($article->getContent(), $article->getTitle());
            $article->setUser($currentUser);
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('_index');
        }

        return $this->render('@VDM/article/new.html.twig', array(
            'article' => $article,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing article entity.
     *
     */
    public function editAction(Request $request, Article $article)
    {
        $editForm = $this->createForm('VDMBundle\Form\ArticleType', $article);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('_index');
        }

        return $this->render('@VDM/article/edit.html.twig', array(
            'article' => $article,
            'edit_form' => $editForm->createView(),
        ));
    }

    public function deleteAction(Article $article){
        $em = $this->getDoctrine()->getManager();
        $image = $em->getRepository('VDMBundle:Picture')->findOneById($article->getPicture()->getId());
        $em->remove($image);
        $em->remove($article);
        $em->flush();
        return $this->redirectToRoute('_index');
    }
}
