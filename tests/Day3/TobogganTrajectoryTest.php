<?php

namespace Opmvpc\Advent\Tests\Day3;

use Opmvpc\Advent\Day3\TobogganTrajectory;
use Opmvpc\Advent\Day3\TobogganTrajectoryParser;
use PHPUnit\Framework\TestCase;

class TobogganTrajectoryTest extends TestCase
{
    /** @test */
    public function knownResult()
    {
        $data = (new TobogganTrajectoryParser(__DIR__ . '/TobogganTrajectoryTestData.txt'))->parse();
        $result = TobogganTrajectory::findTreeCount($data);
        $this->assertEquals(7, $result);
    }

    /** @test */
    public function result()
    {
        $data = (new TobogganTrajectoryParser(__DIR__ . '/TobogganTrajectoryData.txt'))->parse();
        $result = TobogganTrajectory::findTreeCount($data);
        $this->assertEquals(234, $result);
    }

    /** @test */
    public function knownResultTreeCountsProduct()
    {
        $data = (new TobogganTrajectoryParser(__DIR__ . '/TobogganTrajectoryTestData.txt'))->parse();
        $result = TobogganTrajectory::findTreeCountsProducts($data);
        $this->assertEquals(336, $result);
    }

    /** @test */
    public function resultTreeCountsProduct()
    {
        $data = (new TobogganTrajectoryParser(__DIR__ . '/TobogganTrajectoryData.txt'))->parse();
        $result = TobogganTrajectory::findTreeCountsProducts($data);
        $this->assertEquals(5813773056, $result);
    }
}
