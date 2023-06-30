<?php

namespace BrainGames\Progression;

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

function progression($name)
{
    line('What number is missing in the progression?');
    $correctAnswersCount = 0;
    while ($correctAnswersCount < 3) {
        $start = rand (1, 20);
        $delta = rand (2, 10);
        $hidden = rand(1, 10) + $start;
        $correctAnswer = 0;
        $result = '';    
        for ($i = $start; $i <= $start + 10; $i++) {
            if ($hidden == $i) {
                $correctAnswer = $start + $i * $delta;
            }

            $result .= $hidden == $i ? '.. ' : $start + $i * $delta . ' ';
        }
        line("Question: {$result}");
        $userAnswer = prompt("Your answer ");
        if ($userAnswer == $correctAnswer) {
            line ("Correct!");
            $correctAnswersCount++;
        } else {
            line ("{$userAnswer} is wrong answer ;( Correct answer was {$correctAnswer}.");
            line("Let's try again, {$name}!");
            return;
        }
    }
    line("Congratulations, {$name}!");
    
}