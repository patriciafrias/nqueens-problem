<?php
declare(strict_types=1);

namespace Tests\Domain;

use Domain\Game;
use Domain\Board;
use Domain\Dimensions;
use Domain\QueensNumber;
use PHPUnit\Framework\TestCase;
use Throwable;

class GameTest extends TestCase
{
    /**
     * @test
     */
    public function play_whenValidArguments_shouldReturnSolutionWithAllQueensPlaced()
    {
        $board = new Board(new Dimensions(7, 7));
        $queensNumber = new QueensNumber(7);

        $game = new Game($queensNumber, $board);

        $solutions = $game->play(0, 0);

        $this->assertEquals($queensNumber->value(), substr_count($solutions, 'q'));
    }

    /**
     * @test
     *
     * @expectedException Throwable
     */
    public function play_whenInValidArguments_shouldNotBeReached()
    {
        $board = new Board(new Dimensions(7, 7));
        $queensNumber = new QueensNumber(0);

        $game = new Game($queensNumber, $board);

        $game->play(0, 0);
    }
}
