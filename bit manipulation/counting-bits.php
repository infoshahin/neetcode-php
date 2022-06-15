<?php

// URL: https://leetcode.com/problems/counting-bits/

class SolutionWithCountingOneByOne
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

class SolutionUsingDynamicProgramming
{
    /**
     * @return int[]
     */
    function countBits(int $n): array
    {
        $dp[0] = 0;
        $msb = 1;

        for ($i = 1; $i <= $n; $i++) {
            if ($msb * 2 === $i) {
                $msb = $i;
            }
            $dp[$i] = 1 + $dp[$i - $msb];
        }

        return $dp;
    }
}