<?php
/**
 * Copyright © 2021 Moses, LLC. All rights reserved.
 * See LICENSE.txt for license details.
 */
declare(strict_types=1);

namespace Moses\Checkout\Plugin\Magento\Checkout\Model\Type;

use Moses\Log\Services\Configuration;
use Magento\Elasticsearch\Model\Config;
use Psr\Log\LoggerInterface;

/**
 * Class OnepagePlugin
 *
 */
class OnepagePlugin
{
    /**
     * @var Configuration
     */
    private $configuration;

    /**
     * @var LoggerInterface
     */
    private $logger;

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

    public function afterInitCheckout(
        \Magento\Checkout\Model\Type\Onepage $subject
    ) {
        $quote = $subject->getQuote();
        /**
         * Modify cart items here
         */

    }
}
