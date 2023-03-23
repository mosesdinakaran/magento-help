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
class OmsConsumer
{

    /**
     * @param Configuration $configuration
     * @param LoggerInterface $logger
     */
    public function __construct(
        Configuration $configuration,
        LoggerInterface $logger
    ) {
        $this->configuration = $configuration;
        $this->logger = $logger;
    }

    /**
     * @param $string
     * @return void
     */
    public function process($string)
    {
        var_dump($string);


        $this->logger->debug("In Normal: " . $string);
    }
}
