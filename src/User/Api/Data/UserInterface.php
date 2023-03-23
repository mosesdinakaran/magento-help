<?php


namespace Moses\User\Api\Data;

/**
 * @api
 * @since 100.0.2
 */
interface UserInterface
{
    const KEY_ID = 'id';
    const KEY_NAME = 'name';
    const KEY_EMAIL = 'email';
    const KEY_USER_GROUPS = 'user_groups';

    /**
     * @return int|null
     */
    public function getId();

    /**
     * @return string|null
     */
    public function getEmail();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return array
     */
    public function getUserGroups();

    /**
     * @param $name
     * @return $this
     */
    public function setName($name);

    /**
     * @param $email
     * @return $this
     */
    public function setEmail($email);

    /**
     * Set User id
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * Set User id
     *
     * @param array $userGroups
     * @return $this
     */
    public function setUserGroups($userGroups);
}
