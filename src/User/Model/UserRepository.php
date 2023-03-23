<?php

namespace Moses\User\Model;

use \Moses\User\Api\Data\UserInterface;
use \Moses\User\Api\Data\UserInterfaceFactory;
use \Moses\User\Api\UserRepositoryInterface;
use \Moses\User\Model\ResourceModel\User as UserResource;
use \Moses\User\Model\ResourceModel\User\CollectionFactory;
use \Moses\User\Api\Data\UserSearchResultInterfaceFactory;
use \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use \Magento\Framework\Exception\NoSuchEntityException;
use \Magento\Framework\Api\SearchCriteriaInterface;

class UserRepository implements UserRepositoryInterface
{

    protected $userResource;


    protected $userCollectionFactory;


    protected $userSearchResultInterfaceFactory;


    protected $userInterfaceFactory;


    protected $collectionProcessor;


    public function __construct(
        UserResource $userResource,
        CollectionFactory $userCollectionFactory,
        UserSearchResultInterfaceFactory $userSearchResultInterfaceFactory,
        UserInterfaceFactory $userInterfaceFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->userResource           = $userResource;
        $this->userCollectionFactory  = $userCollectionFactory;
        $this->userSearchResultInterfaceFactory       = $userSearchResultInterfaceFactory;
        $this->userInterfaceFactory   = $userInterfaceFactory;
        $this->collectionProcessor      = $collectionProcessor;
    }


    public function save(UserInterface $user)
    {
        try {
            $this->userResource->save($user);

        } catch (\Exception $exception) {
            //$this->logger
        }
        return $user;
    }


    public function getById($entity_id)
    {
        $user = $this->userInterfaceFactory->create();
        $this->userResource->load($user, $entity_id);

        if (!$user->getId()) {
            throw new NoSuchEntityException('Requested user doesn\'t exist');
        }

        return $user;
    }


    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        // Set the Search Criteria
        $searchResults = $this->userSearchResultInterfaceFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);

        // Create the Collection
        $collection = $this->userCollectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);
        $searchResults->setTotalCount($collection->getSize());

        // Format the Results
        $users = [];

        foreach ($collection as $userModel) {

            $users[] = $userModel->getData();
        }

        $searchResults->setItems($users);
        return $searchResults;
    }


    public function delete(UserInterface $user)
    {

        try {
            $this->userResource->delete($user);
        }  catch (\Exception $e) {

          // $this->logger->
        }
        return true;
    }


    public function deleteById($userId)
    {
        $user = $this->getById($userId);
        return $this->delete($user);
    }
}
