<?php

declare(strict_types=1);

namespace Opmvpc\Advent\Day3;

class TobogganTrajectory
{
    public static int $maxX;
    public static int $maxY;

    /**
     * @param array<array<int, string>> $data
     * @return int
     */
    public static function findTreeCount(array $data): int
    {
        static::$maxX = count($data[0]);
        static::$maxY = count($data);

        return static::findTreeCountRec($data, 0, 0, 3, 1, 0);
    }

    /**
     * @param array<array<int, string>> $data
     * @return int
     */
    public static function findTreeCountsProducts(array $data): int
    {
        static::$maxX = count($data[0]);
        static::$maxY = count($data);

        $steps = [
            [1, 1],
            [3, 1],
            [5, 1],
            [7, 1],
            [1, 2],
        ];

        $counts = array_map(fn (array $step) => static::findTreeCountRec($data, 0, 0, $step[0], $step[1], 0), $steps);

        return array_reduce($counts, fn (int $acc, int $count) => $acc * $count, 1);
    }

    /**
     * @param array<array<int, string>> $data
     * @param int $x
     * @param int $y
     * @param int $xStep
     * @param int $yStep
     * @param int $count
     * @return int
     */
    private static function findTreeCountRec(array $data, int $x, int $y, int $xStep, int $yStep, int $count): int
    {
        if ($y < static::$maxY && $data[$y][$x] === '#') {
            $count++;
        }

        if ($y >= static::$maxY) {
            return $count;
        }

        $x += $xStep;
        $y += $yStep;

        if ($x >= static::$maxX) {
            $x = $x - static::$maxX;
        }

        return static::findTreeCountRec($data, $x, $y, $xStep, $yStep, $count);
    }
}
