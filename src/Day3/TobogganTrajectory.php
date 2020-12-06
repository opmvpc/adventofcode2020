<?php

declare(strict_types=1);

namespace Opmvpc\Advent\Day3;

use Opmvpc\Advent\DataStructures\Collection;

class TobogganTrajectory
{
    public static int $maxX;
    public static int $maxY;

    /**
     * @param Collection $data
     * @return int
     */
    public static function findTreeCount(Collection $data): int
    {
        static::$maxX = count($data[0] ?? []);
        static::$maxY = count($data);

        return static::findTreeCountRec($data, 0, 0, 3, 1, 0);
    }

    /**
     * @param Collection $data
     * @return int
     */
    public static function findTreeCountsProducts(Collection $data): int
    {
        static::$maxX = count($data[0] ?? []);
        static::$maxY = count($data);

        $steps = [
            [1, 1],
            [3, 1],
            [5, 1],
            [7, 1],
            [1, 2],
        ];

        return Collection::make($steps)
            ->map(fn (array $step) => static::findTreeCountRec($data, 0, 0, $step[0], $step[1], 0))
            ->product();
    }

    /**
     * @param Collection $data
     * @param int $x
     * @param int $y
     * @param int $xStep
     * @param int $yStep
     * @param int $count
     * @return int
     */
    private static function findTreeCountRec(Collection $data, int $x, int $y, int $xStep, int $yStep, int $count): int
    {
        if ($y < static::$maxY && $data[$y] !== null && $data[$y][$x] === '#') {
            $count++;
        }

        if ($y >= static::$maxY) {
            return $count;
        }

        return static::findTreeCountRec($data, ($x + $xStep) % static::$maxX, $y + $yStep, $xStep, $yStep, $count);
    }
}
