<?php

namespace Moses\User\Model\ResourceModel\User;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use \Moses\User\Model\User;
use \Moses\User\Model\ResourceModel\User as UserResourceModel;
class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'id';

    public function _construct()
    {
        $this->_init(
            User::class,
            UserResourceModel::class
        );
    }
}
