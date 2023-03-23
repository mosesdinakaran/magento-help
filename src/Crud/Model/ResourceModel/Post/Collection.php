<?php

namespace Moses\Crud\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Moses\Crud\Model\Post::class,
            \Moses\Crud\Model\ResourceModel\Post::class
        );
        $this->_map['fields']['page_id'] = 'main_table.page_id';
    }

}
