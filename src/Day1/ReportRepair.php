<?php

declare(strict_types=1);

namespace Opmvpc\Advent\Day1;

class ReportRepair
{
    /**
     * @param array<int> $data
     * @return array<int>
     */
    public static function find2NumbersWhereSumEquals2020(array $data): array
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
     * @return array<int>
     */
    public static function find3NumbersWhereSumEquals2020(array $data): array
    {
        $result = [];
        foreach ($data as $number) {
            foreach ($data as $otherNumber) {
                foreach ($data as $anotherNumber) {
                    if ($number + $otherNumber + $anotherNumber === 2020) {
                        $result[0] = $number;
                        $result[1] = $otherNumber;
                        $result[2] = $anotherNumber;
                    }
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
        $result = 1;
        foreach ($data as $number) {
            $result *= $number;
        }

        return $result;
    }

    /**
     * @param array<int> $data
     * @param int $numbersCount
     * @return int
     */
    public static function result(array $data, int $numbersCount): int
    {
        if ($numbersCount === 2) {
            $foundNumbers = static::find2NumbersWhereSumEquals2020($data);
        } else {
            $foundNumbers = static::find3NumbersWhereSumEquals2020($data);
        }


        return static::multiplication($foundNumbers);
    }
}
