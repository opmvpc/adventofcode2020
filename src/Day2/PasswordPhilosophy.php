<?php

declare(strict_types=1);

namespace Opmvpc\Advent\Day2;

use Opmvpc\Advent\DataStructures\Collection;

class PasswordPhilosophy
{
    /**
     * @param Collection $passwords
     * @return int
     */
    public static function passwordOkCount(Collection $passwords): int
    {
        return $passwords
            ->map(fn (PasswordDTO $passwordData) => intval(static::isPasswordOk($passwordData)))
            ->sum();
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
