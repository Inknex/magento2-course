<?php

namespace Kram\Handler\Helper;

class Single
{
    protected $var;

    public function __construct(
        $inputVar = 5
    )
    {
        $this->setVar($inputVar);
    }

    public function setVar($var)
    {
        $this->var = $var;
    }

    public function getVar()
    {
        return $this->var;
    }    
}