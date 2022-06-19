<?php

// URL: https://leetcode.com/problems/two-sum-ii-input-array-is-sorted/

class Solution
{
    /**
     * @param int[] $numbers
     * @return int[]
     */
    function twoSum(array $numbers, int $target): array
    {
        $i = 0;
        $j = count($numbers) - 1;

        while ($i < $j
        ) {
            $sum = $numbers[$i] + $numbers[$j];

            if ($sum === $target) {
                return [$i + 1, $j + 1];
            }

            if ($sum > $target) {
                $j--;
            } else {
                $i++;
            }
        }

        return [];  // this will never happen
    }
}