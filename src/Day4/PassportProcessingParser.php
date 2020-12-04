<?php

declare(strict_types=1);

namespace Opmvpc\Advent\Day4;

use Opmvpc\Advent\AbstractParser;

class PassportProcessingParser extends AbstractParser
{
    /**
     * @return array<int, array<string, string>>
     */
    public function parse(): array
    {
        $explodedData = explode("\n\n", $this->fileContent);
        $filteredData = array_filter($explodedData, fn (string $line) => $line !== '');
        $passportsData = str_replace("\n", ' ', $filteredData);
        $passportsData = array_map(function (string $passportData) {
            $passportData = explode(' ',  $passportData);
            $passportData = array_filter($passportData, fn (string $line) => $line !== '');
            $passportData = array_map(fn (string $passport) => explode(':',  $passport), $passportData);
            $passportData = array_map(fn (array $passport) => [$passport[0] => $passport[1]], $passportData);
            $passportData = array_merge(...$passportData);

            return $passportData;
        }, $passportsData);

        return $passportsData;
    }
}
