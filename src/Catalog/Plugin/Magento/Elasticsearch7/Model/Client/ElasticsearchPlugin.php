<?php
namespace Moses\Catalog\Plugin\Magento\Elasticsearch7\Model\Client;

use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\App\Request\Http;

class ElasticsearchPlugin
{
    /**
     * @var CollectionFactory
     */
    protected $productCollectionFactory;

    protected $request;

    /**
     * @param CollectionFactory $productCollectionFactory
     * @param Http $request
     */
    public function __construct(
        CollectionFactory $productCollectionFactory,
        Http $request
    ) {
        $this->productCollectionFactory = $productCollectionFactory;
        $this->request = $request;
    }

    public function beforeQuery($subject, $query)
    {
        $filteredIds = $this->productCollectionFactory->create()
            ->addAttributeToSelect('*');

        /**
         * Configured 15, 19 activities in magento admin panel and tried to filter the results
         * 15 => Cycling
         * 19 => Overnight
         * */

        $filteredIds->addAttributeToFilter([
            ['attribute' => 'activity', ['finset' => 3333333]],
            ['attribute' => 'activity', ['finset' => 31]]]);

        if ($this->request->getFullActionName()=='catalog_category_view') {
            $filteredIds->addAttributeToFilter('sku', ['neq' => '6191']);
        }

        $filteredIds = $filteredIds->getAllIds();


        if (!$filteredIds || count($filteredIds) < 1) {
            return [$query];
        }

        $query['body']['query']['bool']['filter'] = ['ids' => [ 'values' => $filteredIds]];

        return [$query];
    }
}
