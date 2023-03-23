<?php

namespace Moses\Crud\Block;

use Magento\Backend\Block\Template\Context;
use Magento\Framework\View\Element\Template;
use Moses\Crud\Model\ResourceModel\Post\Collection as PostCollection;


class Postlist extends Template implements \Magento\Framework\DataObject\IdentityInterface
{
    private PostCollection $postCollection;

    public function __construct(
        PostCollection $postCollection,
        Context $context
    ) {
        $this->postCollection = $postCollection;
        parent::__construct($context);
    }

    public function getIdentities()
    {
        $identities = [];
        foreach($this->getPostList() as $post) {
            $identities = array_merge($identities,$post->getIdentities());
        }
        return $identities;
    }

    public function getPostList()
    {
        return $this->postCollection->getItems();
    }

}
