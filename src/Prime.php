<?php

namespace BrainGames\Prime;

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

function isPrime($name)
{
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    $correctAnswersCount = 0;
    while ($correctAnswersCount < 3) {
        $number = rand(2, 100);
        line("Question: {$number}");
        $isPrime = true;
        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i == 0) {
                $isPrime = false;
                break;
            }
        }
        $correctAnswer = $isPrime ? 'yes' : 'no';
        $userAnswer = prompt("Your answer");
        if ($userAnswer === $correctAnswer) {
            line('Correct!');
            $correctAnswersCount++;
        } else {
            line("{$userAnswer} is wrong answer ;(. Correct answer was {$correctAnswer}");
            line("Let's try again, {$name}!");
            return;
        }
    }
    line("Congratulations, {$name}!");
}
