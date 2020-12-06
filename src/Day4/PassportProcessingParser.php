<?php

declare(strict_types=1);

namespace Opmvpc\Advent\Day4;

use Opmvpc\Advent\AbstractParser;
use Opmvpc\Advent\DataStructures\Collection;

class PassportProcessingParser extends AbstractParser
{
    /**
     * @return Collection
     */
    public function parse(): Collection
    {
        return Collection::make(explode("\n\n", $this->fileContent))
            ->filter()
            ->map(fn (string $str) => str_replace("\n", ' ', $str))
            ->map(function (string $passportData) {
                return Collection::make(explode(' ',  $passportData))
                    ->filter()
                    ->map(fn (string $passport) => explode(':',  $passport))
                    ->map(fn (array $passport) => [$passport[0] => $passport[1]])
                    ->flatten();
                ;
            })
            ;

        // $explodedData = explode("\n\n", $this->fileContent);
        // $filteredData = array_filter($explodedData, fn (string $line) => $line !== '');
        // $passportsData = str_replace("\n", ' ', $filteredData);
        // $passportsData = array_map(function (string $passportData) {
        //     $passportData = explode(' ',  $passportData);
        //     $passportData = array_filter($passportData, fn (string $line) => $line !== '');
        //     $passportData = array_map(fn (string $passport) => explode(':',  $passport), $passportData);
        //     $passportData = array_map(fn (array $passport) => [$passport[0] => $passport[1]], $passportData);
        //     $passportData = array_merge(...$passportData);

        //     return $passportData;
        // }, $passportsData);

        // return $passportsData;
    }
}
