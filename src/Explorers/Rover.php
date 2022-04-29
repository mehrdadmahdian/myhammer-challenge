<?php

namespace Mehrdadmahdian\MyHammer\Explorers;

use Mehrdadmahdian\MyHammer\Contracts\ExplorerInterface;

class Rover implements ExplorerInterface
{
    /**
     * @var int
     */
    private int $x;

    /**
     * @var int
     */
    private int $y;

    /**
     * @var string
     */
    private string $dir;

    /**
     * default state on creating is "0 0 N"
     * @param string $specifications
     * @throws \Exception
     */
    public function __construct(string $specifications)
    {
        $exploded = explode(' ', $specifications);

        $this->x = (isset($exploded[0]) and is_numeric($exploded[0])) ? $exploded[0] : 0;
        $this->y = (isset($exploded[1]) and is_numeric($exploded[1])) ? $exploded[1] : 0;
        $this->setDir($exploded[2] ?? "N");
    }

    /**
     * @return string[]
     */
    private function getAcceptedDirs(): array
    {
        return ["N", "E", "S", "W"];
    }

    /**
     * @return void
     * @throws \Exception
     */
    private function commandR(): void
    {
        $this->setDir(
            guessNextElementOnArray(
                $this->getAcceptedDirs(),
                $this->getDir()
            )
        );
    }

    /**
     * @return void
     * @throws \Exception
     */
    private function commandL(): void
    {
        $this->setDir(
            guessNextElementOnArray(
                array_reverse(
                    $this->getAcceptedDirs()),
                $this->getDir()
            )
        );
    }

    /**
     * @return void
     */
    private function commandM(): void
    {
        if ($this->getDir() == "N") {
            $this->y = $this->y + 1;
        }
        else if ($this->getDir() == "E") {
            $this->x = $this->x + 1;
        }
        else if ($this->getDir() == "S") {
            $this->y = $this->y - 1;
        }
        else if ($this->getDir() == "W") {
            $this->x = $this->x - 1;
        }
    }

    /**
     * @param $command
     * @param $params
     * @return void
     */
    public function command($command, $params = null): void
    {
        $type = 'command'.$command;
        $this->$type($params);
    }

    /**
     * @param string $dir
     * @return void
     * @throws \Exception
     */
    private function setDir(string $dir)
    {
        if (!in_array($dir, $this->getAcceptedDirs())) {
            throw new \Exception('Unsupported Rover Direction.');
        }
        $this->dir = $dir;
    }

    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }

    /**
     * @return string
     */
    public function getDir(): string
    {
        return $this->dir;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->getX(). ' '.$this->getY().' '.$this->getDir();
    }

}