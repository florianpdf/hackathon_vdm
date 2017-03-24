<?php
// src/AppBundle/Entity/User.php

namespace UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    protected $id;


    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $articles;


    /**
     * Add article
     *
     * @param \VDMBundle\Entity\Article $article
     *
     * @return User
     */
    public function addArticle(\VDMBundle\Entity\Article $article)
    {
        $this->articles[] = $article;

        return $this;
    }

    /**
     * Remove article
     *
     * @param \VDMBundle\Entity\Article $article
     */
    public function removeArticle(\VDMBundle\Entity\Article $article)
    {
        $this->articles->removeElement($article);
    }

    /**
     * Get articles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArticles()
    {
        return $this->articles;
    }
}
