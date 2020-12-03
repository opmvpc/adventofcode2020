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

        return static::findTreeCountRec($data, 0, 0, 0);
    }

    /**
     * @param array<array<int, string>> $data
     * @param int $x
     * @param int $y
     * @param int $count
     * @return int
     */
    private static function findTreeCountRec(array $data, int $x, int $y, int $count): int
    {
        if ($y < static::$maxY && $data[$y][$x] === '#') {
            $count++;
        }

        if ($y >= static::$maxY) {
            return $count;
        }

        $x += 3;
        $y += 1;

        if ($x >= static::$maxX) {
            $x = $x - static::$maxX;
        }

        return static::findTreeCountRec($data, $x, $y, $count);
    }
}
