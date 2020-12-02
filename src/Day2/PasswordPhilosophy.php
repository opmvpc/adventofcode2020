<?php

declare(strict_types=1);

namespace Opmvpc\Advent\Day2;

class PasswordPhilosophy
{
    /**
     *
     * @param array<string, string> $passwordData
     * @return bool
     */
    public static function isPasswordOk(array $passwordData): bool
    {
        $occurenceCount = static::countCharOccurence($passwordData['char'], $passwordData['password']);

        return $occurenceCount >= $passwordData['min'] && $occurenceCount <= $passwordData['max'];
    }

    /**
     * @param string $charToFind
     * @param string $password
     * @return int
     */
    private static function countCharOccurence(string $charToFind, string $password): int
    {
        $count = 0;
        foreach (str_split($password) as $char) {
            if ($char === $charToFind) {
                $count++;
            }
        }

        return $count;
    }

    /**
     * @param array<int, array<string, string>> $passwords
     * @return int
     */
    public static function passwordOkCount(array $passwords): int
    {
        $count = 0;
        foreach ($passwords as $passwordData) {
            if (static::isPasswordOk($passwordData)) {
                $count++;
            }
        }

        return $count;
    }
}
