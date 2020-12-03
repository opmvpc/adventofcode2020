<?php

declare(strict_types=1);

namespace Opmvpc\Advent\Day2;

class PasswordDTO
{
    private int $min;
    private int $max;
    private string $char;
    private string $password;

    public function __construct(
        int $min,
        int $max,
        string $char,
        string $password
    ) {
        $this->min = $min;
        $this->max = $max;
        $this->char = $char;
        $this->password = $password;
    }

    /**
     * Get the value of min
     */
    public function getMin(): int
    {
        return $this->min;
    }

    /**
     * Get the value of max
     */
    public function getMax(): int
    {
        return $this->max;
    }

    /**
     * Get the value of char
     */
    public function getChar(): string
    {
        return $this->char;
    }

    /**
     * Get the value of password
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}
