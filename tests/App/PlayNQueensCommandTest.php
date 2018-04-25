<?php
declare(strict_types=1);

namespace Tests\App;

use app\ConsoleCommand\PlayNQueensCommand;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Throwable;

class PlayNQueensCommandTest extends TestCase
{
    /**
     * @test
     */
    public function playNQueens_whenValidArguments_shouldReturnSolutionWithAllQueensPlaced()
    {
        $application = new Application();

        $playNQueensConsoleCommand = new PlayNQueensCommand();

        $application->add($playNQueensConsoleCommand);

        $command = $application->find('app:play-nqueens');

        $commandTester = new CommandTester($command);

        $commandTester->execute([
            'command'  => $command->getName(),
            'queens' => 7,
            'board-columns' => 7,
            'board-rows' => 7
        ]);

        $result = $commandTester->getDisplay(true);

        $this->assertEquals(7, substr_count($result, 'q'));
    }

    /**
     * @test
     *
     * @expectedException Throwable
     */
    public function playNQueens_whenInvalidArguments_shouldNotWork()
    {
        $application = new Application();

        $playNQueensConsoleCommand = new PlayNQueensCommand();

        $application->add($playNQueensConsoleCommand);

        $command = $application->find('app:play-nqueens');

        $commandTester = new CommandTester($command);

        $commandTester->execute([
            'command'  => $command->getName(),
            'queens' => 0,
            'board-columns' => 7,
            'board-rows' => 7
        ]);
    }
}
