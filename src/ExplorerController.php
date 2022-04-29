<?php

namespace Mehrdadmahdian\MyHammer;

use Mehrdadmahdian\MyHammer\Contracts\ExplorerInterface;

class ExplorerController
{
    private ExplorerInterface $explorer;

    public function __construct(ExplorerInterface $explorer)
    {
        $this->explorer = $explorer;
    }

    /**
     * @return ExplorerInterface
     */
    public function getExplorer(): ExplorerInterface
    {
        return $this->explorer;
    }


    /**
     * @param string $commandSeries
     * @return void
     */
    public function command(string $commandSeries): void
    {
        $series = str_split($commandSeries);

        foreach ($series as $command) {
            $this->explorer->command($command);
        }
    }


}