<?php

namespace Earphone\EarphoneCollection\Block;

use Magento\Framework\View\Element\Template;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory as ProductCollectionFactory;
use Magento\Catalog\Model\CategoryFactory;
use Magento\Wishlist\Helper\Data as WishlistHelper;
use Magento\Framework\Data\Form\FormKey;
use Magento\Store\Model\StoreManagerInterface;

class Earphone extends Template
{
    protected $productCollectionFactory;
    protected $categoryFactory;
    protected $wishlistHelper;
    protected $formKey;
    protected $storeManager;

    public function __construct(
        Template\Context $context,
        ProductCollectionFactory $productCollectionFactory,
        CategoryFactory $categoryFactory,
        WishlistHelper $wishlistHelper,
        FormKey $formKey,
        StoreManagerInterface $storeManager,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->productCollectionFactory = $productCollectionFactory;
        $this->categoryFactory = $categoryFactory;
        $this->wishlistHelper = $wishlistHelper;
        $this->formKey = $formKey;
        $this->storeManager = $storeManager;
    }

    public function getProductCollection()
    {
        // Get category ID
        $categoryId = 84;

        // Get category model
        $category = $this->categoryFactory->create()->load($categoryId);

        // Get product collection filtered by category
        $collection = $this->productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addCategoryFilter($category);
        $collection->setPageSize(10);

        return $collection;
    }

    // Function to construct image URL from image path
    public function getImageUrlFromPath($imagePath)
    {
        return $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . 'catalog/product' . $imagePath;
    }

    // Function to get Add to Cart URL
    public function getAddToCartUrl($product)
    {
        return $this->getUrl('checkout/cart/add', ['product' => $product->getId(), 'form_key' => $this->formKey->getFormKey()]);
    }

    public function getAddToWishlistParams($product)
    {
        return $this->wishlistHelper->getAddParams($product);
    }

    public function getFormKeyForWishlist()
    {
        $key = $this->formKey->getFormKey();
        return $key;
    }
}
