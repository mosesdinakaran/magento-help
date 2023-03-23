<?php

namespace Moses\UiComponents\ViewModel;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class Product implements ArgumentInterface, IdentityInterface
{

    private $product;
    private $productRepository;

    public function __construct(\Magento\Catalog\Api\ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getIdentities()
    {
        $product = $this->product;
        echo 'ssssss';exit;

        return $product ? $product->getIdentities() : [];
    }


    public function getProduct($sku)
    {
        //echo 'asdfasdf';exit;
       // $this->product = $this->productRepository->get($sku);
       // return $this->product;
    }
}
