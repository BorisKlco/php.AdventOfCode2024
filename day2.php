<?php

$input = "
7 6 4 2 1
1 2 7 8 9
9 7 6 2 1
1 3 2 4 5
8 6 4 4 1
1 3 6 7 9
";

// Part One
$levels = explode(PHP_EOL, trim($input));
$score = 0;

foreach ($levels as $level){
    $current = strtok($level, ' ');
    $next =  strtok(' ');
    $setDirection = $current <=> $next;

    do {
        $dir = $current <=> $next;
        $distance = $current - $next;
        $safe = (abs($distance) > 0) && (abs($distance) < 4);

    
        if (($setDirection === $dir) && $safe){
            $current = $next;
            $next = strtok(' ');
            $score += $next === false ? 1 : 0;
        } else {
            break;
        }
    
    } while ($next);
}


echo "Score: " . $score . PHP_EOL;