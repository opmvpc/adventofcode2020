<?php

declare(strict_types=1);

namespace Opmvpc\Advent\Day6;

use Ds\Set;
use Opmvpc\Advent\DataStructures\Collection;

class CustomCustoms
{
    /**
     * @param Collection $data
     * @return int
     */
    public static function getPositiveAnswersSum(Collection $data): int
    {
        return $data
            ->map(fn (string $line) => str_replace("\n", ' ', $line))
            ->map(fn (string $line) => str_replace(' ', '', $line))
            ->map(fn (string $line) => str_split($line))
            ->map(fn (array $chars) => (new Set($chars))->count())
            ->sum();
    }

    /**
     * @param Collection $data
     * @return int
     */
    public static function getSamePositiveAnswersSum(Collection $data): int
    {
        return $data
            ->map(fn (string $line) => Collection::make(explode("\n", $line))->filter())
            ->map(fn (Collection $chars) => $chars->map(fn (string $char) => str_split($char)))
            ->map(fn (Collection $chars) => $chars->intersect()->count())
            ->sum();
    }
}
