<?php

declare(strict_types=1);

namespace Opmvpc\Advent\Day1;

use Opmvpc\Advent\AbstractParser;
use Opmvpc\Advent\DataStructures\Collection;

class ReportRepairParser extends AbstractParser
{
    public function parse(): Collection
    {
        return Collection::make(explode("\n", $this->fileContent))
            ->filter();
    }
}
