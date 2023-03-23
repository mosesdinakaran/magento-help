<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Moses\UserGraphQl\Model\Resolver;

use Magento\CatalogGraphQl\Model\Resolver\Products\Query\ProductQueryInterface;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlAuthorizationException;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Catalog\Model\Layer\Resolver;
use Magento\CatalogGraphQl\DataProvider\Product\SearchCriteriaBuilder;

/**
 * Products field resolver, used for GraphQL request processing.
 */
class Users implements ResolverInterface
{
    /**
     * @var ProductQueryInterface
     */
    private $searchQuery;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchApiCriteriaBuilder;

    /**
     * @param ProductQueryInterface $searchQuery
     * @param SearchCriteriaBuilder|null $searchApiCriteriaBuilder
     */
    public function __construct(
        \Moses\User\Model\UserRepository $userRepository,
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    ) {
        $this->userRepository = $userRepository;
        $this->searchCriteria = $searchCriteria;
    }

    /**
     * @inheritdoc
     */
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {
        $data = $this->userRepository->getList($this->searchCriteria);
        /**
         * $data = Array
         * Array
         * (
         *      [total_count] => 3
         *      [list] => Array (
         *              [0] => Array (
         *                  [id] => 1
         *                  [email] => mosesdinakaran@gmail.com
         *                  [name] => Moses
         *              )
         *
         *              [1] => etc
         *      )
         * )
         */
        $data = [
            'total_count' => $data->getTotalCount(),
            'list' => $data->getItems(),
        ];
        return $data;
    }

    /**
     * Validate input arguments
     *
     * @param array $args
     * @throws GraphQlAuthorizationException
     * @throws GraphQlInputException
     */
    private function validateInput(array $args)
    {

    }
}
