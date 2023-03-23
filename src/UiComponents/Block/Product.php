<?php

namespace Moses\UiComponents\Block;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\View\Element\Template;

class Product extends Template implements IdentityInterface
{

    private $product;
    private $productRepository;


    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository
    ) {
        $this->productRepository = $productRepository;
        parent::__construct($context);
    }


    public function getIdentities()
    {
        $product = $this->product;

        return $product ? $product->getIdentities() : [];
    }


    public function getProduct($sku)
    {
         $this->product = $this->productRepository->get($sku);
         return $this->product;
    }
}
