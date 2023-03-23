<?php

namespace Moses\Blog\Block;

use Magento\Backend\Block\Template\Context;
use Magento\Framework\View\Element\Template;
use Moses\Blog\Model\ResourceModel\Blog\Collection as BlogCollection;


class Bloglist extends Template implements \Magento\Framework\DataObject\IdentityInterface
{
    private BlogCollection $blogCollection;

    public function __construct(
        BlogCollection $blogCollection,
        Context $context
    ) {
        $this->blogCollection = $blogCollection;
        parent::__construct($context);
    }

    public function getIdentities()
    {
        $identities = [];
        foreach($this->getBlogList() as $post) {
            $identities = array_merge($identities,$post->getIdentities());
        }
        return $identities;
    }

    public function getBlogList()
    {
        return $this->blogCollection->getItems();
    }

}
