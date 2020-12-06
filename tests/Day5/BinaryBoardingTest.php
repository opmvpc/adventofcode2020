<?php

namespace Opmvpc\Advent\Tests\Day5;

use Opmvpc\Advent\Day5\BinaryBoarding;
use Opmvpc\Advent\Day5\BinaryBoardingParser;
use PHPUnit\Framework\TestCase;

class BinaryBoardingTest extends TestCase
{
    /** @test */
    public function knownResultPart1()
    {
        $data = (new BinaryBoardingParser(__DIR__ . '/BinaryBoardingTestData.txt'))->parse();
        $result = BinaryBoarding::getMaxSeatId($data);
        $this->assertEquals(820, $result);
    }

    /** @test */
    public function resultPart1()
    {
        $data = (new BinaryBoardingParser(__DIR__ . '/BinaryBoardingData.txt'))->parse();
        $result = BinaryBoarding::getMaxSeatId($data);
        $this->assertEquals(816, $result);
    }

    /** @test */
    public function resultPart2()
    {
        $data = (new BinaryBoardingParser(__DIR__ . '/BinaryBoardingData.txt'))->parse();
        $result = BinaryBoarding::getMySeatId($data);
        $this->assertEquals(539, $result);
    }
}
