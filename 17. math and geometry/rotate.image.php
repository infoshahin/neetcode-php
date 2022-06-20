<?php

// URL: https://leetcode.com/problems/rotate-image/

class Solution
{
    /**
     * @param integer[][] $matrix
     */
    function rotate(array &$matrix): void
    {
        $left = 0;
        $right = count($matrix) - 1;

        while ($left < $right) {
            for ($i = 0; $i < $right - $left; $i++) {
                $top = $left;
                $bottom = $right;

                // save the topleft to temp variable
                $topLeft = $matrix[$top][$left + $i];

                // move bottom left into top left
                $matrix[$top][$left + $i] = $matrix[$bottom - $i][$left];

                // move bottom right into bottom left
                $matrix[$bottom - $i][$left] = $matrix[$bottom][$right - $i];

                // move top right into bottom right
                $matrix[$bottom][$right - $i] = $matrix[$top + $i][$right];

                // move top left into top right
                $matrix[$top + $i][$right] = $topLeft;
            }
            $right--;
            $left++;
        }
    }
}