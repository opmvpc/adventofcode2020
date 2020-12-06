<?php

declare(strict_types=1);

namespace Opmvpc\Advent\Day2;

use Opmvpc\Advent\AbstractParser;
use Opmvpc\Advent\DataStructures\Collection;

class PasswordPhilosophyParser extends AbstractParser
{
    /**
     * @return Collection
     */
    public function parse(): Collection
    {
        return Collection::make(explode("\n", $this->fileContent))
            ->filter()
            ->map(fn (string $line) => static::createPasswordDTO($line));
    }

    public static function createPasswordDTO(string $line): PasswordDTO
    {
        $explodedLine = explode(" ", $line);

        return new PasswordDTO(
            intval(explode("-", $explodedLine[0])[0]),
            intval(explode("-", $explodedLine[0])[1]),
            substr($explodedLine[1], 0, 1),
            $explodedLine[2],
        );
    }
}
