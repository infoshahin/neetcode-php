<?php

// URL: https://leetcode.com/problems/decode-ways/

class Solution
{
    function numDecodings(string $s): int
    {
        if (empty($s)) {
            return 0;
        }
        $count = strlen($s);

        $paths = array_fill(0, $count + 1, 0);
        $paths[0] = 1;
        $paths[1] = ($s[0] === '0') ? 0 : 1;

        for ($i = 2; $i < $count + 1; $i++) {
            if (substr($s, $i - 1, 1) !== '0') {
                $paths[$i] += $paths[$i - 1];
            }
            $val = intval(substr($s, $i - 2, 2));
            if ($val >= 10 && $val <= 26) {
                $paths[$i] += $paths[$i - 2];
            }
        }

        return end($paths);
    }
}