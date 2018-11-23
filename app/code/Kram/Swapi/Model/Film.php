<?php
namespace Kram\Swapi\Model;
class Film extends \Magento\Framework\Model\AbstractModel implements \Kram\Swapi\Api\Data\FilmInterface, \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'kram_swapi_film';

    protected function _construct()
    {
        $this->_init('Kram\Swapi\Model\ResourceModel\Film');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
