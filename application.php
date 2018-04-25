#!/usr/bin/env php
<?php
/**
 * Entry point for Symfony ConsoleCommands
 */

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use app\ConsoleCommand\PlayNQueensCommand;
use Symfony\Component\Console\Application;

$application = new Application('Play NQueens', '1.0.0');

$playNQueensConsoleCommand = new PlayNQueensCommand();

$application->add($playNQueensConsoleCommand);

try {
    $application->run();
} catch (Exception $e) {
    echo "An error occurs executing the application.";
}



