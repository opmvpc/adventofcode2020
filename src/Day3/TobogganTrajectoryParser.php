<?php

declare(strict_types=1);

namespace Opmvpc\Advent\Day3;

use Opmvpc\Advent\AbstractParser;
use Opmvpc\Advent\DataStructures\Collection;

class TobogganTrajectoryParser extends AbstractParser
{
    /**
     * @return Collection
     */
    public function parse(): Collection
    {
        return Collection::make(explode("\n", $this->fileContent))
            ->filter()
            ->map(fn (string $line) => str_split($line));
    }
}
