<?php

namespace Opmvpc\Advent\Tests\Day2;

use Opmvpc\Advent\Day2\PasswordDTO;
use Opmvpc\Advent\Day2\PasswordPhilosophy;
use Opmvpc\Advent\Day2\PasswordPhilosophyParser;
use Opmvpc\Advent\Day2\PasswordPhilosophyPartTwo;
use PHPUnit\Framework\TestCase;

class PasswordPhilosophyTest extends TestCase
{
    /** @test */
    public function isPasswordOk()
    {
        $data = new PasswordDTO(
            1,
            3,
            'a',
            'abcde',
        );

        $result = PasswordPhilosophy::isPasswordOk($data);
        $this->assertTrue($result);
    }

    /** @test */
    public function isPasswordPartTwoOk()
    {
        $data = new PasswordDTO(
            1,
            3,
            'a',
            'abcde',
        );

        $result = PasswordPhilosophyPartTwo::isPasswordOk($data);
        $this->assertTrue($result);
    }

    /** @test */
    public function passwordsOkCount()
    {
        $data = (new PasswordPhilosophyParser(__DIR__ . '/PasswordPhilosophyData.txt'))->parse();
        $result = PasswordPhilosophy::passwordOkCount($data);
        $this->assertEquals(439, $result);
    }

    /** @test */
    public function passwordsPartTwoOkCount()
    {
        $data = (new PasswordPhilosophyParser(__DIR__ . '/PasswordPhilosophyData.txt'))->parse();
        $result = PasswordPhilosophyPartTwo::passwordOkCount($data);
        $this->assertEquals(584, $result);
    }
}
