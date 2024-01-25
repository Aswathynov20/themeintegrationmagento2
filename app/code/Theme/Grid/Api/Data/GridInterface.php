<?php

namespace Theme\Grid\Api\Data;

interface GridInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const id = 'id';
    const TITLE = 'title';

    const EMAIL = 'email';

    /**
     * Get ArticleId.
     *
     * @return int
     */
    public function getArticleId();



    /**
     * Set ArticleId.
     */
    public function setArticleId($articleId);

    /**
     * Get Title.
     *
     * @return varchar
     */
    public function getTitle();

    public function getEmail();

    public function setEmail($email);

    /**
     * Set Title.
     */
    public function setTitle($title);
}