<?php

namespace Opmvpc\Advent\Tests\Day1;

use Opmvpc\Advent\Day3\TobogganTrajectory;
use Opmvpc\Advent\Day3\TobogganTrajectoryParser;
use PHPUnit\Framework\TestCase;

class TobogganTrajectoryTest extends TestCase
{
    private function getTestData(): array
    {
        return (new TobogganTrajectoryParser(__DIR__ . '/TobogganTrajectoryData.txt'))->parse();
    }

    /** @test */
    public function knownResult()
    {
        $data = (new TobogganTrajectoryParser(__DIR__ . '/TobogganTrajectoryData2.txt'))->parse();
        $result = TobogganTrajectory::findTreeCount($data);
        $this->assertEquals(7, $result);
    }

    /** @test */
    public function result()
    {
        $data = $this->getTestData();
        $result = TobogganTrajectory::findTreeCount($data);
        $this->assertEquals(234, $result);
    }
}
