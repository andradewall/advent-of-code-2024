<?php

declare(strict_types=1);

// 1. READ INPUT FROM FILE
$file = file(__DIR__ . '/../../assets/inputs/days/day01.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// 2. SPLIT THE INPUT TO LEFT AND RIGHT LIST
$leftList = [];
$rightList = [];
foreach ($file as $line) {
    [$leftList[], $rightList[]] = explode("  ", $line);
}

// 3. SORT BOTH LIST BY ASC
sort($leftList);
sort($rightList);

// 4. GET THE DIFF BETWEEN ALL INDEXES AND SUM IT
$sum = 0;
for ($i = 0; $i < count($file); $i++) {
    $diff = abs((int) $leftList[$i] - (int) $rightList[$i]);
    $sum += $diff;
}

// 5. DISPLAY THE SUM
echo "Result: {$sum}";
