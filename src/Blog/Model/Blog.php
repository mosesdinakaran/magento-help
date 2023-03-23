<?php

/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Moses\Blog\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use Moses\Blog\Api\Data\BlogInterface;

class Blog extends AbstractModel
    implements BlogInterface, IdentityInterface
{
    const CACHE_TAG = 'blog';

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Moses\Blog\Model\ResourceModel\Blog::class);
    }
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
    /**
     * @inheritDoc
     */
    public function getBlogId()
    {
        return $this->getData(self::BLOG_ID);
    }

    /**
     * @inheritDoc
     */
    public function setBlogId($blogId)
    {
        return $this->setData(self::BLOG_ID, $blogId);
    }

    /**
     * @inheritDoc
     */
    public function getContent()
    {
        return $this->getData(self::CONTENT);
    }

    /**
     * @inheritDoc
     */
    public function setContent($content)
    {
        return $this->setData(self::CONTENT, $content);
    }

    /**
     * @inheritDoc
     */
    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    /**
     * @inheritDoc
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }
}

