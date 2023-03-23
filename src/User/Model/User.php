<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Moses\User\Model;

use \Moses\User\Api\Data\UserInterface;
use \Magento\Framework\Model\AbstractExtensibleModel;
/**
 * @inheritdoc
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class User extends  AbstractExtensibleModel implements UserInterface
{
    /**
     * @inherit
     */
    public function getId()
    {
        return $this->getData(UserInterface::KEY_ID);
    }

    /**
     * @inherit
     */
    public function getName()
    {
        return $this->getData(UserInterface::KEY_NAME);
    }

    /**
     * @inherit
     */
    public function getEmail()
    {
        return $this->getData(UserInterface::KEY_EMAIL);
    }

    /**
     * @inherit
     */
    public function getUserGroups()
    {
        return $this->getData(UserInterface::KEY_USER_GROUPS);
    }

    /**
     * @inherit
     */
    public function setName($value)
    {
        return $this->setData(UserInterface::KEY_NAME, $value);
    }

    /**
     * @inherit
     */
    public function setEmail($value)
    {
        return $this->setData(UserInterface::KEY_EMAIL, $value);
    }

    /**
     * @inherit
     */
    public function setId($value)
    {
        return $this->setData(UserInterface::KEY_ID, $value);
    }

    /**
     * @inherit
     */
    public function setUserGroups($value)
    {
        return $this->setData(UserInterface::KEY_USER_GROUPS, $value);
    }
}
