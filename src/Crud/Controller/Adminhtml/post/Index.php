<?php

namespace Moses\Crud\Controller\Adminhtml\post;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    /**
     * @var PageFactory
     */
    protected $resultPagee;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Index action
     *
     * @return void
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Moses_Crud::post');
        $resultPage->addBreadcrumb(__('Moses'), __('Moses'));
        $resultPage->addBreadcrumb(__('Manage item'), __('Manage Post'));
        $resultPage->getConfig()->getTitle()->prepend(__('Manage Post'));

        return $resultPage;
    }
}
?>