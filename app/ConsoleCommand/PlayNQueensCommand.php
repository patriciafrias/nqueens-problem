<?php
declare(strict_types=1);

namespace app\ConsoleCommand;

use Domain\Board;
use Domain\Dimensions;
use Domain\Game;
use Domain\QueensNumber;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PlayNQueensCommand extends Command
{
    const COMMAND_NAME        = 'app:play-nqueens';
    const COMMAND_DESCRIPTION = 'Play N Queens.';
    const COMMAND_HELP        = 'Command to calculate solutions for the N Queens chessboard.';

    const NUMBER_QUEENS = 'queens';
    const BOARD_COLUMNS = 'board-columns';
    const BOARD_ROWS    = 'board-rows';

    /**
     * @inheritdoc
     */
    protected function configure(): void
    {
        $this->setName(self::COMMAND_NAME)
            ->setDescription(self::COMMAND_DESCRIPTION)
            ->setHelp(self::COMMAND_HELP)
            ->addArgument(self::NUMBER_QUEENS, InputArgument::REQUIRED)
            ->addArgument(self::BOARD_COLUMNS, InputArgument::REQUIRED)
            ->addArgument(self::BOARD_ROWS, InputArgument::REQUIRED)
        ;
    }

    /**
     * @inheritdoc
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $board = new Board(
            new Dimensions((int)$input->getArgument(self::BOARD_COLUMNS), (int)$input->getArgument(self::BOARD_ROWS))
        );

        $queensNumber = new QueensNumber((int)$input->getArgument(self::NUMBER_QUEENS));

        $game = new Game($queensNumber, $board);

        $result = $game->play(0, 0);

        $output->write($result);
    }
}

