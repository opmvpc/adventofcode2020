<?php

namespace Opmvpc\Advent\Tests\Day1;

use Opmvpc\Advent\Day1\ReportRepair;
use PHPUnit\Framework\TestCase;

class ReportRepairTest extends TestCase
{
    /** @test */
    public function addition2NumbersResultIs2020()
    {
        $result = ReportRepair::find2NumbersWhereSumEquals2020($this->getTestData());
        $this->assertEquals(2020, array_sum($result));
    }

    /** @test */
    public function addition3NumbersResultIs2020()
    {
        $result = ReportRepair::find3NumbersWhereSumEquals2020($this->getTestData());
        $this->assertEquals(2020, array_sum($result));
    }

    /** @test */
    public function multiplicationIsOk()
    {
        $result = ReportRepair::multiplication([11, 53]);
        $this->assertEquals(583, $result);
    }

    private function getTestData(): array
    {
        $data = file_get_contents(__DIR__.'/ReportRepairData.txt');
        $explodedData = explode("\n", $data);
        $filterdData = array_filter($explodedData, fn ($number) => $number !== '');

        return $filterdData;
    }

    /** @test */
    public function getResult2Numbers()
    {
        $result = ReportRepair::result($this->getTestData(), 2);
        $this->assertEquals(211899, $result);
    }

    /** @test */
    public function getResult3Numbers()
    {
        $result = ReportRepair::result($this->getTestData(), 3);
        $this->assertEquals(275765682, $result);
    }
}
