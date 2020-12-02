<?php

namespace Opmvpc\Advent\Tests\Day2;

use Opmvpc\Advent\Day2\PasswordPhilosophy;
use Opmvpc\Advent\Day2\PasswordPhilosophyPartTwo;
use PHPUnit\Framework\TestCase;

class PasswordPhilosophyTest extends TestCase
{
    /** @test */
    public function isPasswordOk()
    {
        $data = [
            'min' => 1,
            'max' => 3,
            'char' => 'a',
            'password' => 'abcde',
        ];

        $result = PasswordPhilosophy::isPasswordOk($data);
        $this->assertTrue($result);
    }

    /** @test */
    public function isPasswordPartTwoOk()
    {
        $data = [
                'min' => 1,
                'max' => 3,
                'char' => 'a',
                'password' => 'abcde',
            ];

        $result = PasswordPhilosophyPartTwo::isPasswordOk($data);
        $this->assertTrue($result);
    }

    /** @test */
    public function passwordsOkCount()
    {
        $result = PasswordPhilosophy::passwordOkCount($this->getTestData());
        $this->assertEquals(439, $result);
    }

    /** @test */
    public function passwordsPartTwoOkCount()
    {
        $result = PasswordPhilosophyPartTwo::passwordOkCount($this->getTestData());
        $this->assertEquals(584, $result);
    }

    private function getTestData(): array
    {
        $data = file_get_contents(__DIR__.'/PasswordPhilosophyData.txt');
        $explodedData = explode("\n", $data);
        $finalData = [];
        $filterdData = array_filter($explodedData, fn ($line) => $line !== '');
        foreach ($filterdData as $line) {
            $explodedLine = explode(" ", $line);
            $lineData['min'] = explode("-", $explodedLine[0])[0];
            $lineData['max'] = explode("-", $explodedLine[0])[1];
            $lineData['char'] = substr($explodedLine[1], 0, 1);
            $lineData['password'] = $explodedLine[2];
            $finalData[] = $lineData;
        }

        return $finalData;
    }
}
