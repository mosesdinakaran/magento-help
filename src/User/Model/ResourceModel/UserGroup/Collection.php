<?php

namespace Moses\User\Model\ResourceModel\UserGroup;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use \Moses\User\Model\UserGroup;
use \Moses\User\Model\ResourceModel\UserGroup as UserGroupResourceModel;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'id';

    public function _construct()
    {
        $this->_init(
            UserGroup::class,
            UserGroupResourceModel::class
        );
    }
}
