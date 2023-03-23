<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Moses\Blog\Model\ResourceModel\Blog;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'blog_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Moses\Blog\Model\Blog::class,
            \Moses\Blog\Model\ResourceModel\Blog::class
        );
    }
}

