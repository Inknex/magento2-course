<?php

namespace Kram\Swapi\Helper;

class Single
{
    protected $var = 5;

    public function setVar($var)
    {
        $this->var = $var;
    }

    public function getVar()
    {
        return $this->var;
    }    
}