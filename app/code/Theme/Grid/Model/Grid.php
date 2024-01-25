<?php
// app/code/Theme/Grid/Model/Grid.php

namespace Theme\Grid\Model;

use Theme\Grid\Api\Data\GridInterface;

class Grid extends \Magento\Framework\Model\AbstractModel implements GridInterface
{
    const CACHE_TAG = 'thecoachsmb_article';
    protected $_cacheTag = 'thecoachsmb_article';
    protected $_eventPrefix = 'thecoachsmb_article';

    protected function _construct()
    {
        $this->_init('Theme\Grid\Model\ResourceModel\Grid');
    }

    public function getArticleId()
    {
        return $this->getData(self::id);
    }

    public function setArticleId($articleId)
    {
        return $this->setData(self::id, $articleId);
    }

    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }

    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }
}