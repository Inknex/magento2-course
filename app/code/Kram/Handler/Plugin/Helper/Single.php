<?php
namespace Kram\Handler\Plugin\Helper;
class Single
{
    //function beforeMETHOD($subject, $arg1, $arg2){}
    //function aroundMETHOD($subject, $proceed, $arg1, $arg2){return $proceed($arg1, $arg2);}
    //function afterMETHOD($subject, $result){return $result;}

    public function beforeSetVar($subject, $arg1)
    {
        /**
         * Square of incoming argument if it's odd
         */
        if ($arg1 % 2 != 0) {
            return pow($arg1, 2);
        }
        return $arg1;
    }

    public function afterGetVar($subject, $result)
    {
        return "Wrapped result in plugin -> {$result}";
    }

    public function aroundGetVar($subject, $proceed)
    {
        // some actions before

        $result = $proceed();

        // some actions after

        return $result;
    }
}
