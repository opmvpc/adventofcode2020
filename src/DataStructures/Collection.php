<?php

declare(strict_types=1);

namespace Opmvpc\Advent\DataStructures;

use ArrayAccess;
use Countable;
use Iterator;
use Traversable;

/**
 * @psalm-consistent-constructor
 */
class Collection implements ArrayAccess, Iterator, Traversable, Countable
{
    private array $elements = [];

    private int $position = 0;

    public function __construct(array $array = [])
    {
        $this->elements = $array;
    }

    public static function make(array $array = []): self
    {
        return new static($array);
    }

    public function current(): int
    {
        return $this->position;
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function key(): int
    {
        return $this->position;
    }

    public function valid(): bool
    {
        return isset($this->elements[$this->position]);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->elements[] = $value;
        } else {
            $this->elements[$offset] = $value;
        }
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->elements[$offset]);
    }

    /**
     * @param mixed $offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->elements[$offset]);
    }

    /**
     * @param mixed $offset
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return isset($this->elements[$offset])
            ? $this->elements[$offset]
            : null;
    }

    public function toArray(): array
    {
        return $this->elements;
    }

    public function count(): int
    {
        return count($this->elements);
    }

    public function min(): int
    {
        return min($this->elements);
    }

    public function max(): int
    {
        return max($this->elements);
    }

    public function sum(): int
    {
        return intval(array_sum($this->elements));
    }

    public function product(): int
    {
        return intval(array_product($this->elements));
    }

    public function filter(?callable $callable = null): self
    {
        if ($callable === null) {
            return new Collection(array_filter($this->elements));
        }

        return new Collection(array_filter($this->elements, $callable));
    }

    public function map(callable $callable): self
    {
        return new Collection(array_map($callable, $this->elements));
    }

    public function reduce(callable $callable)
    {
        return array_reduce($this->elements, $callable);
    }

    public function dd(): void
    {
        dd($this);
    }

    /**
     * @return $this
     */
    public function dump()
    {
        dump($this);

        return $this;
    }

    public function intersect(): self
    {
        if (count($this->elements) <= 1) {
            return new static($this->elements[0]);
        }

        return new static(array_intersect(...$this->elements));
    }

    public function first()
    {
        return $this->elements[0] ?? null;
    }

    public function last()
    {
        return $this->elements[count($this->elements) - 1] ?? null;
    }
}
