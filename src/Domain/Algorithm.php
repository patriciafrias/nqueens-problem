<?php
declare(strict_types=1);

namespace Domain;

class Algorithm
{
    public static function calculateSolution(Board $board, int $totalQueens, int $queenIndex, int $rowIndex): bool
    {
        for ($colIndex = 0; $colIndex < $totalQueens; $colIndex++) {
            if (self::queenCanBePlacedAt($board, $totalQueens, $rowIndex, $colIndex)) {
                $board->set($rowIndex, $colIndex, 1);

                if (
                    $queenIndex === $totalQueens - 1 ||
                    self::calculateSolution($board, $totalQueens, $queenIndex + 1, $rowIndex + 1) === true
                ) {
                    return true;
                }

                $board->set($rowIndex, $colIndex, 0);
            }
        }

        return false;
    }

    private static function queenCanBePlacedAt(Board $board, int $totalQueens, int $x, int $y): bool
    {
        $n = $totalQueens;

        for ($i = 0; $i < $x; $i++) {
            // check for another Queen
            if ($board->get($i, $y)) {
                return false;
            }

            // check diagonals for another Queen
            if (
                self::checkPrimaryDiagonal($board, $i, $x, $y) ||
                self::checkSecondaryDiagonal($board, $i, $n, $x, $y)
            ) {
                return false;
            }
        }

        return true;
    }

    private static function checkPrimaryDiagonal(Board $board, $i, $x, $y): bool
    {
        $tx = $x - 1 - $i;
        $ty = $y - 1 - $i;

        return $ty >= 0 && $board->get($tx, $ty);
    }

    private static function checkSecondaryDiagonal(Board $board, $i, $n, $x, $y): bool
    {
        $tx = $x - 1 - $i;
        $ty = $y + 1 + $i;

        return $ty < $n && $board->get($tx, $ty);
    }
}
