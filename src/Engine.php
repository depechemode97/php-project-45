<?php

namespace BrainGames\Engine;

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

function calculate($name)
{
    $correctAnswersCount = 0;
    while ($correctAnswersCount < 3) {
        $numberOne = rand(1, 100);
        $numberTwo = rand(1, 100);
        $signs = ['+', '*', '-'];
        $sign = $signs[array_rand($signs)];
        line('What is the result of the expression?');
        line("Question: {$numberOne }{$sign }{$numberTwo }");
        switch ($sign) {
            case '+':
                $result = $numberOne + $numberTwo;
                break;

            case '*':
                $result = $numberOne * $numberTwo;
                break;
            case '-':
                $result = $numberOne - $numberTwo;
                break;
        }
        $userAnswer = prompt('Your answer');
        if ($userAnswer == $result) {
            echo "Correct!\n";
            $correctAnswersCount++;
        } else {
            echo "{$userAnswer} is wrong answer ;(. Correct answer was {$result}. Let's try again, {$name}!\n";
            return;
        }

    }
    echo "Congratulations, {$name}!\n";
}
