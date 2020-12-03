<?php

declare(strict_types=1);

namespace Opmvpc\Advent\Day2;

class PasswordPhilosophy
{
    /**
     *
     * @param PasswordDTO $passwordData
     * @return bool
     */
    public static function isPasswordOk(PasswordDTO $passwordData): bool
    {
        $occurenceCount = static::countCharOccurence($passwordData->getChar(), $passwordData->getPassword());

        return $occurenceCount >= $passwordData->getMin() && $occurenceCount <= $passwordData->getMax();
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
     * @param array<int, PasswordDTO> $passwords
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
