<?php

// URL: https://leetcode.com/problems/largest-rectangle-in-histogram/

class Solution
{
    /**
     * @param int[] $heights
     * @return int
     */
    function largestRectangleArea(array $heights): int
    {
        $maxArea = 0;
        $stack = [];

        foreach ($heights as $i => $h) {
            $start = $i;
            while (!empty($stack) && $stack[array_key_last($stack)][1] > $h) {
                [$index, $height] = array_pop($stack);

                $maxArea = max($maxArea, $height * ($i - $index));
                $start = $index;
            }
            array_push($stack, [$start, $h]);
        }

        foreach ($stack as $high) {
            [$i, $h] = $high;
            $new = $h * (count($heights) - $i);
            $maxArea = max($maxArea, $new);
        }

        return $maxArea;
    }
}