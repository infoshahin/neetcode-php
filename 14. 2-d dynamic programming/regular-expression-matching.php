<?php

// URL: https://leetcode.com/problems/regular-expression-matching/

class Solution
{
    function isMatch(string $s, string $p, int $i = 0,
        int $j = 0,
        array &$cache = []
    ): bool {
        if ($j === strlen($p)) {
            return $i === strlen($s);
        }

        if (isset($cache[$i][$j])) {
            return $cache[$i][$j];
        }

        $first_match = $i < strlen($s) &&
            (substr($p, $j, 1) == substr($s, $i, 1) || substr($p, $j, 1) == ".");

        if ($j < strlen($p) && substr($p, $j + 1, 1) == "*") {
            $result = ($this->isMatch($s, $p, $i, $j + 2, $cache) || ($first_match && $this->isMatch($s, $p, $i + 1, $j, $cache)));
        } else {
            $result = $first_match && $this->isMatch($s, $p, $i + 1, $j + 1, $cache);
        }

        $dict[$i][$j] = $result;

        return $result;
    }
}