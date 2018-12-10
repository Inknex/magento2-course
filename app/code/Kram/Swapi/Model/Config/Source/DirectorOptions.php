<?php
namespace Kram\Swapi\Model\Config\Source;
use Magento\Framework\Data\OptionSourceInterface;

class DirectorOptions implements OptionSourceInterface
{

    public function toOptionArray()
    {
        return [
            [
                'label' => 'Lucas',
                'value' => 'Lucas'
            ],
            [
                'label' => 'Spielberg',
                'value' => 'Spielberg'
            ]
        ];
    }

}