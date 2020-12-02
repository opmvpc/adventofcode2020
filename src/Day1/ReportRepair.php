<?php

declare(strict_types=1);

namespace Opmvpc\Advent\Day1;

class ReportRepair
{
    /**
     * @param array<int> $data
     * @return array<int>
     */
    public static function findNumbersWhereSumEquals2020(array $data): array
    {
        $result = [];
        foreach ($data as $number) {
            foreach ($data as $otherNumber) {
                if ($number + $otherNumber === 2020) {
                    $result[0] = $number;
                    $result[1] = $otherNumber;
                }
            }
        }

        return $result;
    }

    /**
     * @param array<int> $data
     * @return int
     */
    public static function multiplication(array $data): int
    {
        return $data[0] * $data[1];
    }

    /**
     * @param array<int> $data
     * @return int
     */
    public static function result(array $data): int
    {
        $foundNumbers = static::findNumbersWhereSumEquals2020($data);

        return static::multiplication($foundNumbers);
    }
}
