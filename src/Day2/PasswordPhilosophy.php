<?php

declare(strict_types=1);

namespace Opmvpc\Advent\Day2;

class PasswordPhilosophy
{
    /**
     * @param array<int, PasswordDTO> $passwords
     * @return int
     */
    public static function passwordOkCount(array $passwords): int
    {
        return array_reduce($passwords, fn (int $acc, PasswordDTO $passwordData) => $acc + intval(static::isPasswordOk($passwordData)), 0);
    }

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
        return substr_count($password, $charToFind);
    }
}
