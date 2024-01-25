<?php

namespace TopBrands\BrandsList\Model;

use TopBrands\BrandsList\Api\Data\GridInterface;

class Grid extends \Magento\Framework\Model\AbstractModel implements GridInterface
{
    const CACHE_TAG = 'topbrands_grid';
    protected $_cacheTag = 'topbrands_grid';
    protected $_eventPrefix = 'topbrands_grid';

    protected function _construct()
    {
        $this->_init('TopBrands\BrandsList\Model\ResourceModel\Grid');
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

    // public function getEmail()
    // {
    //     return $this->getData(self::EMAIL);
    // }

    // public function setEmail($email)
    // {
    //     return $this->setData(self::EMAIL, $email);
    // }
}