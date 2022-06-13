<?php

// URL: https://leetcode.com/problems/counting-bits/

class Solution
{
    /**
     * @return int[]
     */
    function countBits(int $n): array
    {
        $result = [];
        for ($i = 0; $i <= $n; $i++) {
            $result[] = $this->countOnes($i);
        }

        return $result;
    }

    function countOnes(int $n): int
    {
        $count = 0;
        while ($n > 0) {
            $count += $n % 2;
            $n = $n >> 1;
        }

        return $count;
    }
}