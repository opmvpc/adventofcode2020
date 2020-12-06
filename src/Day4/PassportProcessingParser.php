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
    }
}
