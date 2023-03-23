<?php

namespace Moses\RabbitMq\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface OrderStatusInterface extends ExtensibleDataInterface
{
    /**
     * @var string
     */
    const INCREMENT_ID = 'increment_id';

    /**
     * @var string
     */
    const STATUS = 'status';

    /**
     * return the order Increment Id got from sterling
     *
     * @return string
     */
    public function getIncrementId();

    /**
     * Set the increment id in data object got from sterling
     *
     * @param string $incrementId
     * @return $this
     */
    public function setIncrementId($incrementId);

    /**
     * Gets the Order Status
     *
     * @return string
     */
    public function getStatus();

    /**
     * Sets the Order Status
     *
     * @param string $status
     * @return $this
     */
    public function setStatus($status);

}
