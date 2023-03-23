<?php

namespace Moses\User\Api;
use \Moses\User\Api\Data\UserInterface;
use \Magento\Framework\Api\SearchCriteriaInterface;
interface UserRepositoryInterface
{

    public function save(UserInterface $user);


    public function getById($entityId);


    public function getList(SearchCriteriaInterface $criteria);


    public function delete(UserInterface $user);


    public function deleteById($entityId);
}
