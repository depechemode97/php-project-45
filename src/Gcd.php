<?php

namespace BrainGames\Gcd;

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

function gcd($a, $b)
{
    while ($b != 0) {
        $remainder = $a % $b;
        $a = $b;
        $b = $remainder;
    }
    return $a;
}
function findGcd($name)
{
    line('Find the greatest common divisor of given numbers.');
    $correctAnswersCount = 0;
    while ($correctAnswersCount < 3) {
        $firstNum = rand (1, 1000);
        $secondNum = rand(1, 1000);
        line("Question: {$firstNum} {$secondNum}");
        $result = gcd($firstNum, $secondNum);
        $userAnswer = prompt("Your answer");
        if ($userAnswer == $result) {
            line("Correct!");
            $correctAnswersCount++;
        } else {
            line("{$userAnswer} is wrong aswer :( Correct answer was {$result}.  Let's try again, {$name}!");
            return;
        }
    }
    line("Congratulations, {$name}!");
}
