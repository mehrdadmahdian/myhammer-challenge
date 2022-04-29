<?php

namespace Mehrdadmahdian\MyHammer\Contracts;

interface ExplorerInterface
{
    /**
     * @param string $specifications
     */
    public function __construct(string $specifications);

    /**
     * @return void
     */
    public function command($command, $params = null): void ;

    /**
     * @return string
     */
    public function getState(): string;

}