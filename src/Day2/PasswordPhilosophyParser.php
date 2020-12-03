<?php

declare(strict_types=1);

namespace Opmvpc\Advent\Day2;

use Opmvpc\Advent\AbstractParser;

class PasswordPhilosophyParser extends AbstractParser
{
    public function parse(): array
    {
        $explodedData = explode("\n", $this->fileContent);
        $filterdData = array_filter($explodedData, fn ($line) => $line !== '');
        foreach ($filterdData as $line) {
            $explodedLine = explode(" ", $line);
            $passwordDTO = new PasswordDTO(
                intval(explode("-", $explodedLine[0])[0]),
                intval(explode("-", $explodedLine[0])[1]),
                substr($explodedLine[1], 0, 1),
                $explodedLine[2],
            );
            $finalData[] = $passwordDTO;
        }

        return $finalData;
    }
}
