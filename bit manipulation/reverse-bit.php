<?php

// URL: https://leetcode.com/problems/reverse-bits/

class Solution
{
    function reverseBits(int $n): int
    {
        $reverse = 0;
        for ($i = 0; $i < 32; $i++) {
            $bit = ($n >> $i) & 1;      // get the right most bit
            $reverse = $reverse | ($bit << (32 - 1 - $i));  // replace the left most bit
        }
        return $reverse;
    }
}