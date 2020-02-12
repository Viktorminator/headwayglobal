<?php

namespace App;

class Matrix
{
    private $matrix = [];

    private $height;

    private $width;

    private $numberEights;

    /**
     * @param $width
     * @param $height
     * @param $number
     */
    public function __construct(int $width = 8, int $height = 8, int $number = 5)
    {
        for ($row = 0; $row < $width; $row++) {
            for ($column = 0; $column < $height; $column++) {
                $this->matrix[$row][$column] = 0;
            }
        }
        $this->width = $width;
        $this->height = $height;
        $this->numberEights = $number;
    }

    public function getMatrix()
    {
        $this->seedPositionsWithEights();
        $this->fillGaps();
        return $this->matrix;
    }

    private function addSymbol()
    {
        $position = $this->createRandomPosition();
        $this->matrix[$position[0]][$position[1]] = '8';
        $this->setNeightbors($position[0], $position[1]);
    }

    private function createRandomPosition()
    {
        do {
            $randomPosition = [
                rand(0, $this->getRows() - 1),
                rand(0, $this->getColumns() - 1)
            ];
        } while ($this->matrix[$randomPosition[0]][$randomPosition[1]] != 0);

        return $randomPosition;
    }

    private function seedPositionsWithEights()
    {
        for ($i = 0; $i < $this->numberEights; $i++) {
            $this->addSymbol();
        }
    }

    private function setNeightbors($x, $y)
    {
        $m = $this->matrix;
        if (isset($m[$x][$y - 1])) {
            $m[$x][$y - 1]++;
        }
        if (isset($m[$x - 1][$y - 1])) {
            $m[$x - 1][$y - 1]++;
        }
        if (isset($m[$x + 1][$y - 1])) {
            $m[$x + 1][$y - 1]++;
        }
        if (isset($m[$x - 1][$y])) {
            $m[$x - 1][$y]++;
        }
        if (isset($m[$x + 1][$y])) {
            $m[$x + 1][$y]++;
        }
        if (isset($m[$x][$y + 1])) {
            $m[$x][$y + 1]++;
        }
        if (isset($m[$x - 1][$y + 1])) {
            $m[$x - 1][$y + 1]++;
        }
        if (isset($m[$x + 1][$y + 1])) {
            $m[$x + 1][$y + 1]++;
        }

        $this->matrix = $m;
    }

    private function getRows()
    {
        return $this->height;
    }

    private function getColumns()
    {
        return $this->width;
    }

    private function fillGaps()
    {
        for ($row = 0; $row < $this->width; $row++) {
            for ($column = 0; $column < $this->height; $column++) {
                $this->matrix[$row][$column] = $this->matrix[$row][$column] ?: '-';
            }
        }
    }
}
