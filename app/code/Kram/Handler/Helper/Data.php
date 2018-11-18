<?php

namespace Kram\Handler\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{

    public function snakeToCamel($snake)
    {
        $camel = ucwords($snake, '_');
        return str_replace('_', '', $camel);
    }

}