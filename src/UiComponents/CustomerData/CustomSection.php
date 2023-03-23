<?php


namespace Moses\UiComponents\CustomerData;

use Magento\Customer\CustomerData\SectionSourceInterface;
use Magento\Framework\DataObject;

class CustomSection extends DataObject implements SectionSourceInterface
{
    /**
     * CustomSection constructor.
     * @param array $data
     */
    public function __construct(
        array $data = []
    ) {
        parent::__construct($data);
    }
    /**
     * @return array
     */
    public function getSectionData()
    {
        return ['message'=>'This is message from section'];
    }
}
