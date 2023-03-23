<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Moses\User\Model;

use \Moses\User\Api\Data\UserGroupInterface;
use \Magento\Framework\Model\AbstractExtensibleModel;

/**
 * @inheritdoc
 *
 */
class UserGroup extends AbstractExtensibleModel implements UserGroupInterface
{
    /**
     * @inherit
     */
    public function getId()
    {
        return $this->getData(UserGroupInterface::KEY_ID);
    }
    /**
     * @inherit
     */
    public function setId($value)
    {
        return $this->setData(UserGroupInterface::KEY_ID, $value);
    }
    /**
     * @inherit
     */
    public function getGroupName()
    {
        return $this->getData(UserGroupInterface::KEY_GROUP_NAME);
    }
    /**
     * @inherit
     */
    public function setGroupName($value)
    {
        return $this->setData(UserGroupInterface::KEY_GROUP_NAME, $value);
    }

    /**
     * @inherit
     */
    public function getUserId()
    {
        return $this->getData(UserGroupInterface::KEY_USER_ID);
    }

    /**
     * @inherit
     */
    public function setUserId($value)
    {
        return $this->setData(UserGroupInterface::KEY_USER_ID, $value);
    }
}
