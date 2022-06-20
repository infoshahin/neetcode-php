<?php

// URL: https://leetcode.com/problems/car-fleet/

class Solution
{
    /**
     * @param int[] $position
     * @param int[] $speed
     */
    function carFleet(int $target, array $position, array $speed): int 
    {
        $map = [];
        $stack = [];
        $result = 0;

        for ($i = 0; $i < count($position); $i++) {
            $map[$position[$i]] = $speed[$i];
        }

        for ($i = $target - 1; $i >= 0; $i--) {
            if (isset($map[$i])) {
                $toa = ($target - $i) / $map[$i];

                if (count($stack) > 0 && (end($stack) >= $toa)
                ) {
                    continue;
                }

                $result++;
                $stack[] = $toa;
            }
        }

        return $result;
    }
}