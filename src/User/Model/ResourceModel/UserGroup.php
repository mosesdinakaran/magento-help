<?php

namespace Moses\User\Model\ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class UserGroup extends AbstractDb
{
    public function _construct()
    {
        $this->_init('moses_user_group', 'id');
    }
}
