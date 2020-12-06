<?php

declare(strict_types=1);

namespace Opmvpc\Advent\Day6;

use Opmvpc\Advent\AbstractParser;
use Opmvpc\Advent\DataStructures\Collection;

class CustomCustomsParser extends AbstractParser
{
    /**
     * @return Collection
     */
    public function parse(): Collection
    {
        $explodedData = explode("\n\n", $this->fileContent);

        return Collection::make($explodedData)
            ->filter();
    }
}
