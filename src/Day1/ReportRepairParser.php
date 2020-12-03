<?php

declare(strict_types=1);

namespace Opmvpc\Advent\Day1;

use Opmvpc\Advent\AbstractParser;

class ReportRepairParser extends AbstractParser
{
    public function parse(): array
    {
        $explodedData = explode("\n", $this->fileContent);
        $filteredData = array_filter($explodedData, fn ($number) => $number !== '');

        return $filteredData;
    }
}
