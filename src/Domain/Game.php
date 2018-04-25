<?php
declare(strict_types=1);

namespace Domain;

class Game
{
    /** @var Board */
    private $board;

    /** @var QueensNumber */
    private $queensNumber;

    public function __construct(QueensNumber $queensNumber, Board $board)
    {
        $this->board = $board;
        $this->queensNumber = $queensNumber;
    }

    public function play($queenIndex, $rowIndex)
    {
        Algorithm::calculateSolution($this->board, $this->queensNumber->value(), $queenIndex, $rowIndex);

        return $this->board->render();
    }
}
