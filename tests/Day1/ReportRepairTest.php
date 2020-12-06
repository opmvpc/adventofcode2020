<?php

namespace Opmvpc\Advent\Tests\Day1;

use Opmvpc\Advent\Day1\ReportRepair;
use Opmvpc\Advent\Day1\ReportRepairParser;
use PHPUnit\Framework\TestCase;

class ReportRepairTest extends TestCase
{
    /** @test */
    public function addition2NumbersResultIs2020()
    {
        $data = (new ReportRepairParser(__DIR__ . '/ReportRepairData.txt'))->parse();
        $result = ReportRepair::find2NumbersWhereSumEquals2020($data);
        $this->assertEquals(2020, array_sum($result));
    }

    /** @test */
    public function addition3NumbersResultIs2020()
    {
        $data = (new ReportRepairParser(__DIR__ . '/ReportRepairData.txt'))->parse();
        $result = ReportRepair::find3NumbersWhereSumEquals2020($data);
        $this->assertEquals(2020, array_sum($result));
    }

    /** @test */
    public function getResult2Numbers()
    {
        $data = (new ReportRepairParser(__DIR__ . '/ReportRepairData.txt'))->parse();
        $result = ReportRepair::result($data, 2);
        $this->assertEquals(211899, $result);
    }

    /** @test */
    public function getResult3Numbers()
    {
        $data = (new ReportRepairParser(__DIR__ . '/ReportRepairData.txt'))->parse();
        $result = ReportRepair::result($data, 3);
        $this->assertEquals(275765682, $result);
    }
}
