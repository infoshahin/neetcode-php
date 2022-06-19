<?php

// URL: https://leetcode.com/problems/3sum/

class Solution
{
    /**
     * @param int[] $nums
     * @return int[][]
     */
    function threeSum(array $nums): array
    {
        sort($nums);

        $result = [];
        foreach ($nums as $i => $num) {
            if ($i > 0 && $num === $nums[$i - 1]) {
                continue;
            }

            $left = $i + 1;
            $right = count($nums) - 1;
            while ($left < $right) {
                $threeSum = $nums[$left] + $nums[$right] + $num;

                if ($threeSum > 0) {
                    $right--;
                } else if ($threeSum < 0) {
                    $left++;
                } else {
                    $result[] = [$num, $nums[$left], $nums[$right]];
                    $left++;

                    while ($nums[$left] === $nums[$left - 1] && $left < $right) {
                        $left++;
                    }
                }
            }
        }

        return $result;
    }
}