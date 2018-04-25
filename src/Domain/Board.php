<?php
declare(strict_types=1);

namespace Domain;

class Board
{
    /** @var Dimensions */
    private $dimensions;

    /** @var array */
    private $status;

    public function __construct(Dimensions $dimensions)
    {
        $this->dimensions = $dimensions;

        $this->initialize();
    }

    public function render(): string
    {
        $output = "\n";

        foreach ($this->status as $row) {
            $output .= "|" . implode("|", array_map(function (int $item) {
                    return $item ? "q" : " ";
                }, $row)) . "|\n";
        }

        return $output;
    }

    public function get(int $x, int $y): int
    {
        return $this->status[$x][$y];
    }

    public function set(int $x, int $y, int $value): void
    {
        $this->status[$x][$y] = $value;
    }

    public function getDimensions()
    {
        return $this->dimensions;
    }

    public function getStatus(): array
    {
        return $this->status;
    }

    public function setStatus(array $status): self
    {
        $this->status = $status;

        return $this;
    }

    private function initialize(): void
    {
        for ($i = 0; $i < $this->dimensions->getRows(); $i++) {
            $this->status[] = array_fill(0, $this->getDimensions()->getColumns(), 0);
        }
    }
}
