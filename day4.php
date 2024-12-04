<?php

$input ="
MMMSXXMASM
MSAMXMSMSA
AMXSXMAAMM
MSAMASMSMX
XMASAMXAMM
XXAMMXXAMA
SMSMSASXSS
SAXAMASAAA
MAMMMXMMMM
MXMXAXMASX
";

//Part One
$score = 0;
$grid = explode(PHP_EOL, trim($input));
$puzzle = [];

foreach ($grid as $key => $line){
    $puzzle[$key] = str_split($line);
}

$height = count($puzzle);
$width = count($puzzle[$height - 1]);

for ($y=0; $y < $height; $y++){
    for($x=0; $x < $width; $x++){
        if($puzzle[$y][$x] == 'X') {
            $score += horizontal($x,$y);
            $score += vertical($x,$y);
            $score += risingDiagonal($x,$y);
            $score += fallingDiagonal($x,$y);
        }
    }
}

var_dump($score);

function horizontal($x,$y){
    global $puzzle;
    $word = 'XMAS';
    $pos = '';
    $neg = '';
    $score = 0;
    for($i=0;$i < strlen($word); $i++){
        $pos .= $puzzle[$y][$x+$i] ?? '';
        $neg .= $puzzle[$y][$x-$i] ?? '';
    }

    if ($pos == $word){
        $score++;
    } 
    if ($neg == $word){
        $score++;
    }
    return $score;

}
function vertical($x,$y){
    global $puzzle;
    $word = 'XMAS';
    $pos = '';
    $neg = '';
    $score = 0;
    for($i=0;$i < strlen($word); $i++){
        $pos .= $puzzle[$y+$i][$x] ?? '';
        $neg .= $puzzle[$y-$i][$x] ?? '';
    }

    if ($pos == $word){
        $score++;
    } 
    if($neg == $word){
        $score++;
    }

    return $score;

}
function risingDiagonal($x,$y){
    global $puzzle;
    $word = 'XMAS';
    $pos = '';
    $neg = '';
    $score = 0;
    for($i=0;$i < strlen($word); $i++){
        $pos .= $puzzle[$y-$i][$x+$i] ?? '';
        $neg .= $puzzle[$y+$i][$x-$i] ?? '';
    }

    if ($pos == $word){
        $score++;
    } 
    if ($neg == $word){
        $score++;
    }

    return $score;

}
function fallingDiagonal($x,$y){
    global $puzzle;
    $word = 'XMAS';
    $pos = '';
    $neg = '';
    $score = 0;
    for($i=0;$i < strlen($word); $i++){
        $pos .= $puzzle[$y+$i][$x+$i] ?? '';
        $neg .= $puzzle[$y-$i][$x-$i] ?? '';
    }

    if ($pos == $word){
        $score++;
    } 
    if ($neg == $word){
        $score++;
    }
    return $score;

}
