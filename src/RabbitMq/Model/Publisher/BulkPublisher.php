<?php

namespace Moses\RabbitMq\Model\Publisher;

use Magento\AsynchronousOperations\Api\Data\OperationInterface;
use Magento\AsynchronousOperations\Api\Data\OperationInterfaceFactory;
use Magento\Authorization\Model\UserContextInterface;
use Magento\Framework\Bulk\BulkManagementInterface;
use Magento\Framework\DataObject\IdentityGeneratorInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Json\Helper\Data as JsonHelper;
use Magento\Framework\UrlInterface;

/**
 * Class BulkPublisher
 */
class BulkPublisher
{
    /**
     * @var BulkManagementInterface
     */
    private $bulkManagement;

    /**
     * @var OperationInterfaceFactory
     */
    private $operationFactory;

    /**
     * @var IdentityGeneratorInterface
     */
    private $identityService;

    /**
     * @var UrlInterface
     */
    private $urlBuilder;

    /**
     * @var UserContextInterface
     */
    private $userContext;

    /**
     * @var JsonHelper
     */
    private $jsonHelper;

    /**
     * ScheduleBulk constructor.
     *
     * @param BulkManagementInterface $bulkManagement
     * @param OperationInterfaceFactory $operationFactory
     * @param IdentityGeneratorInterface $identityService
     * @param UserContextInterface $userContextInterface
     * @param UrlInterface $urlBuilder
     */
    public function __construct(
        BulkManagementInterface $bulkManagement,
        OperationInterfaceFactory $operationFactory,
        IdentityGeneratorInterface $identityService,
        UserContextInterface $userContextInterface,
        UrlInterface $urlBuilder,
        JsonHelper $jsonHelper
    ) {
        $this->userContext = $userContextInterface;
        $this->bulkManagement = $bulkManagement;
        $this->operationFactory = $operationFactory;
        $this->identityService = $identityService;
        $this->urlBuilder = $urlBuilder;
        $this->jsonHelper = $jsonHelper;

    }


    public function execute()
    {
        $bulkUuid = $this->identityService->generateId();
        $bulkDescription = 'Specify here your bulk description';
        $operations = [];
        for ($i=1000;$i<=1500;$i++) {
            $serializedData = ["increment_id" => $i,'status'=>'enabled'];
            $data = [
                'data' => [
                    'bulk_uuid' => $bulkUuid,
                    //topic name must be equal to data specified in the queue configuration files
                    'topic_name' => 'moses.topic.order.update',
                    'serialized_data' => $this->jsonHelper->jsonEncode($serializedData),
                    'status' => OperationInterface::STATUS_TYPE_OPEN,
                ]
            ];

            /** @var OperationInterface $operation */
            $operation = $this->operationFactory->create($data);
            $operations[] = $operation;

        }
        $result = $this->bulkManagement->scheduleBulk($bulkUuid, $operations, $bulkDescription);
        if (!$result) {
            var_dump($result);
            exit;
            throw new LocalizedException(
                __('Something went wrong while processing the request.')
            );
        }
    }

}
