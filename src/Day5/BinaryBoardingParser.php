<?php

declare(strict_types=1);

namespace Opmvpc\Advent\Day5;

use Opmvpc\Advent\AbstractParser;

class BinaryBoardingParser extends AbstractParser
{
    /**
     * @return array<string, string>
     */
    public function parse(): array
    {
        $explodedData = explode("\n", $this->fileContent);
        $filteredData = array_filter($explodedData, fn ($line) => $line !== '');

        return array_map(fn (string $line) => ['row' => substr($line, 0, 7), 'column' => substr($line, 7, 3)], $filteredData);
    }
}
