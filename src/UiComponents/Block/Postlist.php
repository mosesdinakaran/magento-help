<?php

namespace Moses\UiComponents\Block;

use Magento\Backend\Block\Template\Context;
use Magento\Framework\View\Element\Template;
use Moses\Crud\Model\ResourceModel\Post\Collection as PostCollection;


class Postlist extends Template
{
    private PostCollection $postCollection;

    public function __construct(\Magento\Framework\View\Element\Template\Context $context)
    {
        parent::__construct($context);
    }

/*

    public function __construct(
        PostCollection $postCollection,
        Context $context,
        array $data = []
    ) {

        $this->postCollection = $postCollection;
        parent::__construct($context, $data);
    }
*/

    public function sayHello()
    {
        return __('Hello Worldssssss');
    }

    /*
    public function getPostList()
    {
        echo 'sssssssssssssssssss';
        return $this->postCollection->getItems();
    }
    */
}
