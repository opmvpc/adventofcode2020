<?php

declare(strict_types=1);

namespace Opmvpc\Advent\Day5;

class BinaryBoarding
{
    /**
     * @psalm-pure
     * @param array<string, string> $data
     * @return int
     */
    public static function getMaxSeatId(array $data): int
    {
        $transformedData = array_map('static::seatCodeToInt', $data);

        return max($transformedData);
        ;
    }

    /**
     * @psalm-pure
     * @param array<string, string> $data
     * @return int
     */
    public static function getMySeatId(array $data): int
    {
        $transformedData = array_map('static::seatCodeToInt', $data);

        $min = min($transformedData);
        $max = max($transformedData);
        $total = array_sum($transformedData);

        return static::nFirstIntSum($max) - static::nFirstIntSum($min - 1) - $total;
    }

    /**
     * @psalm-pure
     * @param int $n
     * @return int
     */
    public static function nFirstIntSum(int $n): int
    {
        return ($n * ($n + 1)) / 2;
    }

    /**
     * @psalm-pure
     * @param array<string, string> $code
     * @return int
     */
    public static function seatCodeToInt(array $seatCode): int
    {
        $seatCode = array_map(fn (string $code) => static::binaryToInt($code), $seatCode);

        return $seatCode['row'] * 8 + $seatCode['column'];
    }

    /**
     * @psalm-pure
     * @param string $code
     * @return int
     */
    public static function binaryToInt(string $code): int
    {
        $code = preg_replace("/F|L/", "0", $code);
        $code = preg_replace("/B|R/", "1", $code);

        return bindec($code);
    }
}
