<?php

namespace Opmvpc\Advent\Tests\Day6;

use Opmvpc\Advent\Day6\CustomCustoms;
use Opmvpc\Advent\Day6\CustomCustomsParser;
use PHPUnit\Framework\TestCase;

class CustomCustomsTest extends TestCase
{
    /** @test */
    public function knownResultPart1()
    {
        $data = (new CustomCustomsParser(__DIR__ . '/CustomCustomsTestData.txt'))->parse();
        $result = CustomCustoms::getPositiveAnswersSum($data);
        $this->assertEquals(11, $result);
    }

    /** @test */
    public function resultPart1()
    {
        $data = (new CustomCustomsParser(__DIR__ . '/CustomCustomsData.txt'))->parse();
        $result = CustomCustoms::getPositiveAnswersSum($data);
        $this->assertEquals(6778, $result);
    }

    /** @test */
    public function knownResultPart2()
    {
        $data = (new CustomCustomsParser(__DIR__ . '/CustomCustomsTestData.txt'))->parse();
        $result = CustomCustoms::getSamePositiveAnswersSum($data);
        $this->assertEquals(6, $result);
    }

    /** @test */
    public function resultPart2()
    {
        $data = (new CustomCustomsParser(__DIR__ . '/CustomCustomsData.txt'))->parse();
        $result = CustomCustoms::getSamePositiveAnswersSum($data);
        $this->assertEquals(3406, $result);
    }
}
