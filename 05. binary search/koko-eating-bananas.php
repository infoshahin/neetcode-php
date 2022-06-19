<?php

// URL: https://leetcode.com/problems/koko-eating-bananas/

class Solution
{
    /**
     * @param int[] $piles
     */
    function minEatingSpeed(array $piles, int $h): int
    {
        $low = 1;
        $high = max($piles);

        while ($low <= $high) {
            $mid = floor(($low + $high) / 2);

            $eatingHours = 0;
            foreach ($piles as $pile) {
                $eatingHours += ceil($pile / $mid);
            }

            if ($eatingHours > $h) {
                $low = $mid + 1;
            } else {
                $high = $mid - 1;
            }
        }

        return $low;
    }
}