<?php
namespace Kram\Swapi\Model\ResourceModel;
class Film extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('swapi_film','film_id');
    }
}
