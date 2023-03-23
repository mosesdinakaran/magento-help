<?php

namespace Moses\User\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface UserSearchResultInterface extends SearchResultsInterface
{
    /**
     * @inheirtDoc
     */
    public function getItems();

    /**
     * @inheirtDoc
     */
    public function setItems(array $items);
}
