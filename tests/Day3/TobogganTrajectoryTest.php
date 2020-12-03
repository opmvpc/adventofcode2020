<?php

namespace Opmvpc\Advent\Tests\Day3;

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

    /** @test */
    public function knownResultTreeCountsProduct()
    {
        $data = (new TobogganTrajectoryParser(__DIR__ . '/TobogganTrajectoryData2.txt'))->parse();
        $result = TobogganTrajectory::findTreeCountsProducts($data);
        $this->assertEquals(336, $result);
    }

    /** @test */
    public function resultTreeCountsProduct()
    {
        $data = $this->getTestData();
        $result = TobogganTrajectory::findTreeCountsProducts($data);
        $this->assertEquals(5813773056, $result);
    }
}
