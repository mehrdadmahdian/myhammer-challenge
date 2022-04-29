<?php

namespace Mehrdadmahdian\MyHammer\Explorers;

use Mehrdadmahdian\MyHammer\Contracts\ExplorerInterface;

class ExplorerBuilder
{
    public static function build($type, $specifications): ExplorerInterface
    {
        if (in_array(ExplorerInterface::class, class_implements($type)  )) {
            return new $type($specifications);
        } else {
            throw new \Exception ('Explorer type is not appropriate to build.');
        }
    }

}