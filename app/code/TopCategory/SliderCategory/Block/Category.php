<?php

namespace TopCategory\SliderCategory\Block;

use Magento\Framework\View\Element\Template;
use Magento\Catalog\Model\ResourceModel\Category\CollectionFactory;

class Category extends Template
{
    protected $CategoryCollection;

    public function __construct(
        Template\Context $context,
        CollectionFactory $CategoryCollection,
        array $data = []
    ) {
        $this->CategoryCollection = $CategoryCollection;
        parent::__construct($context, $data);
    }

    public function getDataForPHTML()
    {
        $categories = $this->CategoryCollection->create();
        $categories->addAttributeToSelect('*');
        $categories->addAttributeToFilter('custom_enable_attribute', 1);

        // Initialize the $collection array
        $collection = [];

        foreach ($categories as $category) {
            $collection[] = $category->getData();
        }

        return $collection;
    }
}
