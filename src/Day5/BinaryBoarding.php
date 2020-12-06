<?php

declare(strict_types=1);

namespace Opmvpc\Advent\Day5;

use Opmvpc\Advent\DataStructures\Collection;

class BinaryBoarding
{
    /**
     * @param Collection $data
     * @return int
     */
    public static function getMaxSeatId(Collection $data): int
    {
        return $data->map(fn (Collection $seatCodes) => static::seatCodeToInt($seatCodes))
            ->max();
    }

    /**
     * @param Collection $data
     * @return int
     */
    public static function getMySeatId(Collection $data): int
    {
        $transformedData = $data->map(fn (Collection $seatCodes) => static::seatCodeToInt($seatCodes));

        $min = $transformedData->min();
        $max = $transformedData->max();
        $total = $transformedData->sum();

        return static::nFirstIntSum($max) - static::nFirstIntSum($min - 1) - $total;
    }

    /**
     * @param int $n
     * @return int
     */
    public static function nFirstIntSum(int $n): int
    {
        return intval(($n * ($n + 1)) / 2);
    }

    /**
     * @param Collection $seatCode
     * @return int
     */
    public static function seatCodeToInt(Collection $seatCode): int
    {
        $seatCode = $seatCode->map(fn (string $code) => static::binaryToInt(strval($code)));

        return ($seatCode['row'] ?? 0) * 8 + ($seatCode['column'] ?? 0);
    }

    /**
     * @param string $code
     * @return int
     */
    public static function binaryToInt(string $code): int
    {
        $code = preg_replace("/F|L/", "0", $code);
        $code = preg_replace("/B|R/", "1", $code);

        return intval(bindec($code));
    }
}
