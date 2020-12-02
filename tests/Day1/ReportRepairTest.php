<?php

namespace Opmvpc\Advent\Tests\Day1;

use Opmvpc\Advent\Day1\ReportRepair;
use PHPUnit\Framework\TestCase;

class ReportRepairTest extends TestCase
{
    /** @test */
    public function additionResultIs2020()
    {
        $result = ReportRepair::findNumbersWhereSumEquals2020($this->getTestData());
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
    public function getResult()
    {
        $result = ReportRepair::result($this->getTestData());
        $this->assertEquals(211899, $result);
    }
}
