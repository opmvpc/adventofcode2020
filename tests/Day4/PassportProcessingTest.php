<?php

namespace Opmvpc\Advent\Tests\Day4;

use Opmvpc\Advent\Day4\PassportProcessing;
use Opmvpc\Advent\Day4\PassportProcessingParser;
use PHPUnit\Framework\TestCase;

class PassportProcessingTest extends TestCase
{
    /** @test */
    public function knownResultPart1()
    {
        $data = (new PassportProcessingParser(__DIR__ . '/PassportProcessingTestData.txt'))->parse();
        $result = PassportProcessing::findWellFormedPassportsCount($data);
        $this->assertEquals(2, $result);
    }

    /** @test */
    public function resultPart1()
    {
        $data = (new PassportProcessingParser(__DIR__ . '/PassportProcessingData.txt'))->parse();
        $result = PassportProcessing::findWellFormedPassportsCount($data);
        $this->assertEquals(245, $result);
    }

    /** @test */
    public function knownResultPart2()
    {
        $data = (new PassportProcessingParser(__DIR__ . '/PassportProcessingTestData2.txt'))->parse();
        $result = PassportProcessing::findValidPassportsCount($data);
        $this->assertEquals(4, $result);
    }

    /** @test */
    public function resultPart2()
    {
        $data = (new PassportProcessingParser(__DIR__ . '/PassportProcessingData.txt'))->parse();
        $result = PassportProcessing::findValidPassportsCount($data);
        $this->assertEquals(133, $result);
    }
}
