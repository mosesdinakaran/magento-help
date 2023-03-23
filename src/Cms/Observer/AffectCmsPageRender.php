<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Moses\Cms\Observer;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;

class AffectCmsPageRender implements ObserverInterface
{
    public function execute(EventObserver $observer)
    {
        $page = $observer->getPage();
        $content = $page->getContent();
        /**
         * Modify Content as per your need
         */
        $page->setContent($content);
        return $this;
    }
}
