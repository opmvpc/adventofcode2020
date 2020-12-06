<?php

declare(strict_types=1);

namespace Opmvpc\Advent\Day5;

use Opmvpc\Advent\AbstractParser;
use Opmvpc\Advent\DataStructures\Collection;

class BinaryBoardingParser extends AbstractParser
{
    /**
     * @return Collection
     */
    public function parse(): Collection
    {
        return Collection::make(explode("\n", $this->fileContent))
            ->filter()
            ->map(fn (string $line) => Collection::make(['row' => substr($line, 0, 7), 'column' => substr($line, 7, 3)]));
    }
}
