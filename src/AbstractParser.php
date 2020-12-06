<?php

declare(strict_types=1);

namespace Opmvpc\Advent;

use Opmvpc\Advent\DataStructures\Collection;

abstract class AbstractParser
{
    private string $filePath;

    protected string $fileContent;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
        $this->fileContent();
    }

    /**
     * @return Collection|array
     */
    abstract public function parse();

    private function fileContent(): void
    {
        $this->fileContent = file_get_contents($this->filePath);
    }
}
