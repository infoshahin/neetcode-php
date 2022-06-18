<?php

// URL: https://leetcode.com/problems/daily-temperatures/

class Solution
{
    /**
     * @param int[] $temperatures
     * @return int[]
     */
    function dailyTemperatures(array $temperatures): array
    {
        $result = $stack = [];

        for ($i = 0; $i < count($temperatures); $i++) {
            while (end($stack) < $temperatures[$i] && !empty($stack)) {
                $key = key($stack);
                $result[$key] = $i - $key;
                array_pop($stack);
            }
            $stack[$i] = $temperatures[$i];
        }

        $result = array_replace($result, array_map(function ($v) {
            return 0;
        }, $stack));
        ksort($result);

        return $result;
    }
}