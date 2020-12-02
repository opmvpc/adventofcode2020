<?php

declare(strict_types=1);

namespace Opmvpc\Advent\Day2;

class PasswordPhilosophyPartTwo extends PasswordPhilosophy
{
    /**
     *
     * @param array<string, string> $passwordData
     * @return bool
     */
    public static function isPasswordOk(array $passwordData): bool
    {
        $firstPosIsOk = substr($passwordData['password'], intval($passwordData['min']) - 1, 1) === $passwordData['char'];
        $secondPosIsOk = substr($passwordData['password'], intval($passwordData['max']) - 1, 1) === $passwordData['char'];

        return $firstPosIsOk xor $secondPosIsOk;
    }
}
