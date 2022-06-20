<?php

// URL: https://leetcode.com/problems/spiral-matrix/

class Solution
{
    /**
     * @param int[][] $matrix
     * @return int[]
     */
    function spiralOrder(array $matrix): array
    {
        $result = [];

        $left = 0;
        $right = count($matrix[0]);
        $top = 0;
        $bottom = count($matrix);

        while ($left < $right && $top < $bottom) {
            // get every i in the top row
            for ($i = $left; $i < $right; $i++) {
                $result[] = $matrix[$top][$i];
            }
            $top++;

            // get every i in the right col
            for ($i = $top; $i < $bottom; $i++) {
                $result[] = $matrix[$i][$right - 1];
            }
            $right--;

            if (!($left < $right && $top < $bottom)) {
                break;
            }

            // get every i in the bottom row
            for ($i = $right - 1; $i > $left - 1; $i--) {
                $result[] = $matrix[$bottom - 1][$i];
            }
            $bottom--;

            // get every i in the left col
            for ($i = $bottom - 1; $i > $top - 1; $i--) {
                $result[] = $matrix[$i][$left];
            }
            $left++;
        }

        return $result;
    }
}