<?php


namespace Moses\User\Api;

/**
 * @api
 * @since 100.0.2
 */
interface UserManagementInterface
{
    /**
     * Get the User Data
     *
     * @param integer $userId
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @return \Moses\User\Api\Data\UserInterface
     */
    public function getUser($userId);
}
