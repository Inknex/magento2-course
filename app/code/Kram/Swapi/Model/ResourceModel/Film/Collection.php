<?php
namespace Kram\Swapi\Model\ResourceModel\Film;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Kram\Swapi\Model\Film','Kram\Swapi\Model\ResourceModel\Film');
    }
}
