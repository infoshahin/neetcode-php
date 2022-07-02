<?php

// URL: https://leetcode.com/problems/distinct-subsequences/

class Solution
{
    function numDistinct(string $s, string $t): int
    {
        $cache = [];

        for ($i = 0; $i <= strlen($s);
            $i++
        ) {
            $cache[sprintf("%d-%d", $i, strlen($t))] = 1;
        }

        for ($i = 0; $i < strlen($t); $i++) {
            $cache[sprintf("%d-%d", strlen($s), $i)] = 0;
        }

        for ($i = strlen($s) - 1; $i >= 0; $i--) {
            for ($j = strlen($t) - 1; $j >= 0; $j--) {
                if ($s[$i] === $t[$j]) {
                    $cache["$i-$j"] = $cache[sprintf("%d-%d", $i + 1, $j + 1)] + $cache[sprintf("%d-%d", $i + 1, $j)];
                } else {
                    $cache["$i-$j"] = $cache[sprintf("%d-%d", $i + 1, $j)];
                }
            }
        }

        return $cache["0-0"];
    }
}