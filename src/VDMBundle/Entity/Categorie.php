<?php

namespace VDMBundle\Entity;

/**
 * Categorie
 */
class Categorie
{

    public function __toString()
    {
        return $this->title;
    }

    const MOUTARDE = "VDM de moutarde";
    const APOIL = "VDM à poil";
    const CELIB = "VDM de célib";
    const HOTDOG = "VDM de Hotdog";

    // Generated Code

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $article;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->article = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Categorie
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Add article
     *
     * @param \VDMBundle\Entity\Article $article
     *
     * @return Categorie
     */
    public function addArticle(\VDMBundle\Entity\Article $article)
    {
        $this->article[] = $article;

        return $this;
    }

    /**
     * Remove article
     *
     * @param \VDMBundle\Entity\Article $article
     */
    public function removeArticle(\VDMBundle\Entity\Article $article)
    {
        $this->article->removeElement($article);
    }

    /**
     * Get article
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArticle()
    {
        return $this->article;
    }
}
