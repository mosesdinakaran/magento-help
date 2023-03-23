<?php

namespace Moses\ExtensionAttribute\Plugin\Model\Order;

use Magento\Sales\Api\Data\OrderSearchResultInterface;
use Magento\Sales\Model\OrderFactory;
use Magento\Sales\Api\OrderRepositoryInterface;
use Magento\Sales\Api\Data\OrderExtensionFactory;
use Magento\Sales\Api\Data\OrderInterface;

class AddCustomOrderAttribute
{
    /**
     * @var OrderFactory
     */
    private $orderFactory;

    /**
     * @var OrderExtensionFactory
     */
    private $orderExtensionFactory;

    /**
     * @param OrderExtensionFactory $extensionFactory
     * @param OrderFactory $orderFactory
     */
    public function __construct(
        OrderExtensionFactory $extensionFactory,
        OrderFactory $orderFactory
    ) {
        $this->orderExtensionFactory = $extensionFactory;
        $this->orderFactory = $orderFactory;
    }

    public function beforeSave(\Magento\Sales\Api\OrderRepositoryInterface $subject,$order)
    {
        $extensionAttribute = $order->getExtensionAttributes();
        $pdfInvoice = $extensionAttribute->getBcPdfinvoice();
        $order->setBcPdfinvoice($pdfInvoice);
        return [$order];
    }

    /**
     * Set "BC_Pdfinvoice" to order data
     *
     * @param OrderRepositoryInterface $subject
     * @param OrderSearchResultInterface $searchResult
     *
     * @return OrderSearchResultInterface
     */
    public function setBCPdfInvoiceData(OrderInterface $order)
    {
        if ($order instanceof \Magento\Sales\Model\Order) {
            $myCustomOrderAttribute = $order->getBcPdfInvoice();
        } else {
            $orderModel = $this->orderFactory->create();
            $orderModel->load($order->getId());
            $myCustomOrderAttribute = $orderModel->getBcPdfInvoice();
        }

        $extensionAttributes = $order->getExtensionAttributes();
        $orderExtensionAttributes = $extensionAttributes ? $extensionAttributes
            : $this->orderExtensionFactory->create();

        $myCustomOrderAttribute = $myCustomOrderAttribute ?? '';
        $orderExtensionAttributes->setBcPdfInvoice($myCustomOrderAttribute);

        $order->setExtensionAttributes($orderExtensionAttributes);
    }

    /**
     * Add "BC_Pdfinvoice" extension attribute to order data object
     * to make it accessible in API data
     *
     * @param OrderRepositoryInterface $subject
     * @param OrderSearchResultInterface $searchResult
     *
     * @return OrderSearchResultInterface
     */
    public function afterGetList(
        OrderRepositoryInterface $subject,
        OrderSearchResultInterface $orderSearchResult
    ) {
        foreach ($orderSearchResult->getItems() as $order) {
            $this->setBCPdfInvoiceData($order);
        }
        return $orderSearchResult;
    }

    /**
     * Add "BC_Pdfinvoice" extension attribute to order data object
     * to make it accessible in API data
     *
     * @param OrderRepositoryInterface $subject
     * @param OrderInterface $order
     *
     * @return OrderInterface
     */
    public function afterGet(
        OrderRepositoryInterface $subject,
        OrderInterface $resultOrder
    ) {
        $this->setBCPdfInvoiceData($resultOrder);
        return $resultOrder;
    }
}
