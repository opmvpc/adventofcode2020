<?php

declare(strict_types=1);

namespace Opmvpc\Advent\Day3;

use Opmvpc\Advent\AbstractParser;

class TobogganTrajectoryParser extends AbstractParser
{
    /**
     * @return array<int, array<int, string>>
     */
    public function parse(): array
    {
        $explodedData = explode("\n", $this->fileContent);
        $filteredData = array_filter($explodedData, fn ($line) => $line !== '');

        return array_map(fn (string $line) => str_split($line), $filteredData);
    }
}
