<?php


declare(strict_types=1);

namespace Opmvpc\Advent;

abstract class AbstractParser
{
    private string $filePath;

    protected string $fileContent;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
        $this->fileContent();
    }

    abstract public function parse(): array;

    private function fileContent(): void
    {
        $this->fileContent = file_get_contents($this->filePath);
    }
}
