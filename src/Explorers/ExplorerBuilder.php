<?php

namespace Mehrdadmahdian\MyHammer\Explorers;

use Mehrdadmahdian\MyHammer\Contracts\ExplorerInterface;

class ExplorerBuilder
{
    /**
     * @param string $type
     * @param string $specifications
     * @return ExplorerInterface
     * @throws \Exception
     */
    public static function build(string $type, string $specifications): ExplorerInterface
    {
        if (in_array(ExplorerInterface::class, class_implements($type)  )) {
            return new $type($specifications);
        } else {
            throw new \Exception ('Explorer type is not appropriate to build.');
        }
    }

}