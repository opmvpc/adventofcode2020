<?php

declare(strict_types=1);

namespace Opmvpc\Advent\Day1;

use Opmvpc\Advent\DataStructures\Collection;

class ReportRepair
{
    /**
     * @param Collection $data
     * @param int $numbersCount
     * @return int
     */
    public static function result(Collection $data, int $numbersCount): int
    {
        if ($numbersCount === 2) {
            $foundNumbers = static::find2NumbersWhereSumEquals2020($data);
        } else {
            $foundNumbers = static::find3NumbersWhereSumEquals2020($data);
        }

        return Collection::make($foundNumbers)->product();
    }

    /**
     * @param Collection $data
     * @return array<int>
     */
    public static function find2NumbersWhereSumEquals2020(Collection $data): array
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
     * @param Collection $data
     * @return array<int>
     */
    public static function find3NumbersWhereSumEquals2020(Collection $data): array
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
}
