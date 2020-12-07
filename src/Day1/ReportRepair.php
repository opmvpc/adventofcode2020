<?php

declare(strict_types=1);

namespace Opmvpc\Advent\Day1;

use Ds\Map;
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
            return static::findProductOf2NumbersWhereSumEquals2020($data);
        } else {
            return static::find3NumbersWhereSumEquals2020($data);
        }
    }

    /**
     * @param Collection $data
     * @return int
     */
    public static function findProductOf2NumbersWhereSumEquals2020(Collection $data): int
    {
        $map = new Map();
        $data->map(fn (string $item) => $map->put(intval($item), intval($item)));
        foreach ($data as $number) {
            if ($map->haskey(2020 - $number)) {
                return $number * $map->get(2020 - $number);
            }
        }

        return 0;
    }

    /**
     * @param Collection $data
     * @return int
     */
    public static function find3NumbersWhereSumEquals2020(Collection $data): int
    {
        $map = new Map();
        $data->map(fn (string $item) => $map->put(intval($item), intval($item)));
        foreach ($data as $number) {
            foreach ($data as $otherNumber) {
                if ($map->haskey(2020 - $number - $otherNumber)) {
                    return $number * $otherNumber * $map->get(2020 - $number - $otherNumber);
                }
            }
        }

        return 0;
    }
}
