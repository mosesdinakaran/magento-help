<?php

namespace Moses\User\Model\ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class User extends AbstractDb
{
    public function _construct()
    {
        $this->_init('moses_user', 'id');
    }
}
