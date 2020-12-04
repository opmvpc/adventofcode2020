<?php

declare(strict_types=1);

namespace Opmvpc\Advent\Day4;

class PassportProcessing
{
    private static array $requiredFields = [
        'byr',
        'iyr',
        'eyr',
        'hgt',
        'hcl',
        'ecl',
        'pid',
    ];

    /**
     * @param array<array<string, string>> $data
     * @return int
     */
    public static function findValidPassportsCount(array $data): int
    {
        $validPassports = array_filter($data, fn (array $passport) => static::isValidPassport($passport));

        return count($validPassports);
    }

    public static function isValidPassport(array $passport): bool
    {
        $dif = array_filter(static::$requiredFields, fn (string $requiredKey) => ! in_array($requiredKey, array_keys($passport)));

        return count($dif) === 0;
    }
}
