<?php
namespace Moses\RabbitMq\Model;

use Moses\RabbitMq\Api\Data\OrderStatusInterface;
use Magento\Framework\DataObject;

class OrderStatus extends DataObject implements OrderStatusInterface
{
    /**
     * {@inheritdoc}
     */
    public function getIncrementId()
    {
        return $this->getData(self::INCREMENT_ID);
    }

    /**
     * {@inheritdoc}
     */
    public function setIncrementId($incrementId)
    {
        return $this->setData(self::INCREMENT_ID, $incrementId);
    }

    /**
     * {@inheritdoc}
     */
    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    /**
     * {@inheritdoc}
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }
}
