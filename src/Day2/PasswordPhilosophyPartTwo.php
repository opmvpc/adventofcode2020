<?php

declare(strict_types=1);

namespace Opmvpc\Advent\Day2;

class PasswordPhilosophyPartTwo extends PasswordPhilosophy
{
    /**
     *
     * @param PasswordDTO $passwordData
     * @return bool
     */
    public static function isPasswordOk(PasswordDTO $passwordData): bool
    {
        $firstPosIsOk = substr($passwordData->getPassword(), intval($passwordData->getMin()) - 1, 1) === $passwordData->getChar();
        $secondPosIsOk = substr($passwordData->getPassword(), intval($passwordData->getMax()) - 1, 1) === $passwordData->getChar();

        return $firstPosIsOk xor $secondPosIsOk;
    }
}
