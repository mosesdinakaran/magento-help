<?php


namespace Moses\User\Api\Data;

/**
 * @api
 * @since 100.0.2
 */
interface UserGroupInterface
{
    const KEY_ID = 'id';
    const KEY_GROUP_NAME = 'group_name';
    const KEY_USER_ID = 'user_id';


    public function getId();


    public function setId($id);

    /**
     * @return string
     */
    public function getGroupName();
    /**
     * @param $name
     * @return $this
     */
    public function setGroupName($name);

    /**
     * @return array
     */
    public function getUserId();

    /**
     * @return array
     */
    public function setUserId($userId);
}
