<?php

declare(strict_types=1);

namespace Moses\RabbitMq\Model\Publisher;


use Magento\Framework\MessageQueue\PublisherInterface as QueuePublisherInterface;

class Publisher
{

    private QueuePublisherInterface $publisher;

    public function __construct(
        QueuePublisherInterface $publisher
    ) {
        $this->publisher = $publisher;
    }



    public function publish(): void
    {
        $data = [];
        for ($i=1000;$i<=1500;$i++) {
            $data[] = ["increment_id" => $i,'status'=>'enabled'];
        }
        $time_start = microtime(true);
        foreach ($data as $record) {
            $this->publisher->publish('moses.topic.order.update', json_encode($record));
        }
        $time_end = microtime(true);
        $execution_time = ($time_end - $time_start)/60;
        echo '<b>Total Execution Time:</b> '.$execution_time.' Mins';
    }


}
