<?php

declare(strict_types=1);

$file = file(__DIR__ . '/../../assets/inputs/days/day01.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$leftList = [];
$rightList = [];
foreach ($file as $line) {
    [$leftList[], $rightList[]] = explode("   ", $line);
}

printf("Result for part one: " . partOne($leftList, $rightList));
printf("\nResult for part two: " . partTwo($leftList, $rightList));

/**
 * @param array<int, string>
 * @param array<int, string>
 * @return int
 */
function partOne(array $leftList, array $rightList): int
{
    sort($leftList);
    sort($rightList);

    $sum = 0;
    for ($i = 0; $i < count($leftList); $i++) {
        $diff = abs((int) $leftList[$i] - (int) $rightList[$i]);
        $sum += $diff;
    }

    return $sum;
}

/**
 * @param array<int, string>
 * @param array<int, string>
 * @return int
 */
function partTwo(array $leftList, array $rightList): int
{
    $locationAppearsCount = 0;
    $similarityScore = 0;
    foreach ($leftList as $location) {
        $locationAppearsCount = count(array_filter($rightList, fn ($i) => $i === $location));

        $similarityScore += (int) $location * (int) $locationAppearsCount;
    }

    return $similarityScore;
}
