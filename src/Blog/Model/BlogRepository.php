<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Moses\Blog\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Moses\Blog\Api\BlogRepositoryInterface;
use Moses\Blog\Api\Data\BlogInterface;
use Moses\Blog\Api\Data\BlogInterfaceFactory;
use Moses\Blog\Api\Data\BlogSearchResultsInterfaceFactory;
use Moses\Blog\Model\ResourceModel\Blog as ResourceBlog;
use Moses\Blog\Model\ResourceModel\Blog\CollectionFactory as BlogCollectionFactory;

class BlogRepository implements BlogRepositoryInterface
{

    /**
     * @var BlogInterfaceFactory
     */
    protected $blogFactory;

    /**
     * @var Blog
     */
    protected $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var BlogCollectionFactory
     */
    protected $blogCollectionFactory;

    /**
     * @var ResourceBlog
     */
    protected $resource;


    /**
     * @param ResourceBlog $resource
     * @param BlogInterfaceFactory $blogFactory
     * @param BlogCollectionFactory $blogCollectionFactory
     * @param BlogSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceBlog $resource,
        BlogInterfaceFactory $blogFactory,
        BlogCollectionFactory $blogCollectionFactory,
        BlogSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->blogFactory = $blogFactory;
        $this->blogCollectionFactory = $blogCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(BlogInterface $blog)
    {
        try {
            $this->resource->save($blog);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the blog: %1',
                $exception->getMessage()
            ));
        }
        return $blog;
    }

    /**
     * @inheritDoc
     */
    public function get($blogId)
    {
        $blog = $this->blogFactory->create();
        $this->resource->load($blog, $blogId);
        if (!$blog->getId()) {
            throw new NoSuchEntityException(__('Blog with id "%1" does not exist.', $blogId));
        }
        return $blog;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->blogCollectionFactory->create();
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(BlogInterface $blog)
    {
        try {
            $blogModel = $this->blogFactory->create();
            $this->resource->load($blogModel, $blog->getBlogId());
            $this->resource->delete($blogModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Blog: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($blogId)
    {
        return $this->delete($this->get($blogId));
    }
}

