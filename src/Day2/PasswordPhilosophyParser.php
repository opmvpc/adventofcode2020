<?php

declare(strict_types=1);

namespace Opmvpc\Advent\Day2;

use Opmvpc\Advent\AbstractParser;

class PasswordPhilosophyParser extends AbstractParser
{
    public function parse(): array
    {
        $explodedData = explode("\n", $this->fileContent);
        $filteredData = array_filter($explodedData, fn ($line) => $line !== '');

        return array_map('static::createPasswordDTO', $filteredData);
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
