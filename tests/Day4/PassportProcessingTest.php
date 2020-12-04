<?php

namespace Opmvpc\Advent\Tests\Day4;

use Opmvpc\Advent\Day4\PassportProcessing;
use Opmvpc\Advent\Day4\PassportProcessingParser;
use PHPUnit\Framework\TestCase;

class PassportProcessingTest extends TestCase
{
    /** @test */
    public function knownResult()
    {
        $data = (new PassportProcessingParser(__DIR__ . '/PassportProcessingData2.txt'))->parse();
        $result = PassportProcessing::findValidPassportsCount($data);
        $this->assertEquals(2, $result);
    }

    /** @test */
    public function result()
    {
        $data = (new PassportProcessingParser(__DIR__ . '/PassportProcessingData.txt'))->parse();
        $result = PassportProcessing::findValidPassportsCount($data);
        $this->assertEquals(245, $result);
    }
}
