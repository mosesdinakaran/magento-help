<?php
/**
 * Copyright © 2021 Moses, LLC. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace Moses\RabbitMq\Model;



use Moses\Log\Services\Configuration;
use Psr\Log\LoggerInterface;

/**
 * Service to get module admin configurations
 */
class OmsConsumerOne
{

    public function __construct(
        Configuration $configuration,
        LoggerInterface $logger
    ) {
        $this->configuration = $configuration;
        $this->logger = $logger;
    }

    /**
     * Consume messages and update data in the Algolia
     *
     * @param \Moses\RabbitMq\Api\Data\OrderStatusInterface $mergedProductsData
     * @return void
     */
    public function process(\Moses\RabbitMq\Api\Data\OrderStatusInterface $orderStatus)
    {
        $this->logger->debug("In One: " . $orderStatus->getIncrementId());
        var_dump($orderStatus);
    }
}
