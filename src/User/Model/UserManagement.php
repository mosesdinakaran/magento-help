<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Moses\User\Model;

use \Moses\User\Api\UserManagementInterface;
use \Moses\User\Api\Data\UserInterfaceFactory;

/**
 * @inheritdoc
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class UserManagement implements UserManagementInterface
{

    private $userInterfaceFactory;

    public function __construct(
        UserInterfaceFactory $userInterfaceFactory
    ) {
        $this->userInterfaceFactory = $userInterfaceFactory;
    }

    /**
     * @inheritdoc
     */
    public function getUser($userId)
    {
        $user = $this->userInterfaceFactory->create();
        $user->setId($userId);
        $user->setUserGroups(
            [
                'maths',
                'science'
            ]
        );
        return $user;
    }
}
