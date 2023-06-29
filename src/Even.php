<?php

namespace BrainGames\Even;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}
require_once __DIR__ . '/../src/Cli.php';

use function BrainGames\Cli\greeting;
use function cli\line;
use function cli\prompt;

function isEven($name)
{
    line('Answer "yes" if the number is even, otherwise answer "no"');
    $correctAnswersCount = 0;
    while ($correctAnswersCount < 3) {
        $number = rand(1, 1000);
        line("Question: {$number}");
        $correctAnswer = $number % 2 === 0 ? 'yes' : 'no';
        $userAnswer = prompt('Your answer ');
        if ($userAnswer === $correctAnswer) {
            echo "Correct!\n";
            $correctAnswersCount++;
        } else {
            echo "{$userAnswer} is wrong answer ;(. Correct answer was {$correctAnswer}\n";
            echo "Let's try again, {$name}!\n";
            return;
        }
    }
    echo "Congratulations, {$name}!\n";

}
