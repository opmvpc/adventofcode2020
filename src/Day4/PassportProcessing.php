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
     * @param array<int, array<string, string>> $data
     * @return int
     */
    public static function findWellFormedPassportsCount(array $data): int
    {
        $validPassports = array_filter($data, fn (array $passport) => static::hasRequiredFieldsPassport($passport));

        return count($validPassports);
    }

    /**
     * @param array<int, array<string, string>> $data
     * @return int
     */
    public static function findValidPassportsCount(array $data): int
    {
        $validPassports = array_filter($data, fn (array $passport) => static::hasRequiredFieldsPassport($passport));
        $validPassports = array_filter($validPassports, fn (array $passport) => static::isValidPassport($passport));

        return count($validPassports);
    }

    /**
     * @param array<string, string> $passport
     * @return bool
     */
    public static function hasRequiredFieldsPassport(array $passport): bool
    {
        $dif = array_filter(static::$requiredFields, fn (string $requiredKey) => ! in_array($requiredKey, array_keys($passport)));

        return count($dif) === 0;
    }

    /**
     * @param array<string, string> $passport
     * @return bool
     */
    public static function isValidPassport(array $passport): bool
    {
        if (strlen($passport['byr']) !== 4 || $passport['byr'] < 1920 || $passport['byr'] > 2002) {
            return false;
        }

        if (strlen($passport['iyr']) !== 4 || $passport['iyr'] < 2010 || $passport['iyr'] > 2020) {
            return false;
        }

        if (strlen($passport['eyr']) !== 4 || $passport['eyr'] < 2020 || $passport['eyr'] > 2030) {
            return false;
        }

        if (str_contains($passport['hgt'], 'cm')) {
            $heightVal = intval(str_replace('cm', '', $passport['hgt']));
            if (! ($heightVal >= 150 && $heightVal <= 193)) {
                return false;
            }
        } elseif (str_contains($passport['hgt'], 'in')) {
            $heightVal = intval(str_replace('in', '', $passport['hgt']));
            if (! ($heightVal >= 59 && $heightVal <= 76)) {
                return false;
            }
        } else {
            return false;
        }

        if (! preg_match('/^#([a-f]|[0-9]){6}$/', $passport['hcl'])) {
            return false;
        }

        if (! in_array($passport['ecl'], ['amb', 'blu', 'brn', 'gry', 'grn', 'hzl', 'oth',])) {
            return false;
        }

        if (! preg_match('/^\d{9}$/', $passport['pid'])) {
            return false;
        }

        return true;
    }
}
