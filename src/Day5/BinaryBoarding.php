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

        return array_reduce($transformedData, fn (int $max, int $seatCode) => $max >= $seatCode ? $max : $seatCode, 0);
        ;
    }

    /**
     * @psalm-pure
     * @param array<string, string> $code
     * @return int
     */
    public static function seatCodeToInt(array $seatCode): int
    {
        $seatCode = array_map(function (string $code) {
            $code = preg_replace("/F|L/", "0", $code);
            $code = preg_replace("/B|R/", "1", $code);

            return bindec($code);
        }, $seatCode);

        return $seatCode['row'] * 8 + $seatCode['column'];
    }
}
