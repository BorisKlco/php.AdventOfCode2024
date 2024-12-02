<?php

$input = "
7 6 4 2 1
1 2 7 8 9
9 7 6 2 1
1 3 2 4 5
8 6 4 4 1
1 3 6 7 9
";

// Part One - using strtok
$levels = explode(PHP_EOL, trim($input));
$score = 0;

foreach ($levels as $level) {
    $current = strtok($level, ' ');
    $next =  strtok(' ');
    $setDirection = $current <=> $next;

    do {
        $direction = $current <=> $next;
        $distance = $current - $next;
        $safe = (abs($distance) > 0) && (abs($distance) < 4);


        if (($setDirection === $direction) && $safe) {
            $current = $next;
            $next = strtok(' ');
            $score += $next === false ? 1 : 0;
        } else {
            break;
        }
    } while ($next);
}

echo "Score: " . $score . PHP_EOL;

//Part Two - converting to array
$score = 0;

function checkIfSafe($level)
{
    $inc = true;
    $dec = true;

    for ($i = 0; $i < count($level) - 1; $i++) {
        $diff = $level[$i] - $level[$i + 1];
        $safe = (abs($diff) > 0) && (abs($diff) < 4);

        if (!$safe) {
            return false;
        }

        if ($diff > 0) {
            $inc = false;
        } else {
            $dec = false;
        }
    }

    return $inc || $dec;
}

foreach ($levels as $level) {
    $level = explode(' ', $level);
    $safe = checkIfSafe($level);

    if ($safe) {
        $score += 1;
        continue;
    }

    for ($i = 0; $i < count($level); $i++) {
        $copy = $level;
        unset($copy[$i]);

        if (checkIfSafe(array_values($copy))) {
            $score += 1;
            break;
        }
    }
}

echo "Score: " . $score . PHP_EOL;
