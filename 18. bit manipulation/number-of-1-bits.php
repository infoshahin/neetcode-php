<?php

// URL: https://leetcode.com/problems/number-of-1-bits/

class SolutionUsingModulasOperator
{
    function hammingWeight(int $n): int
    {
        $count = 0;
        while ($n > 0) {
            $count += $n % 2;
            $n = $n >> 1;
        }

        return $count;
    }
}

class SolutionUsingAndOperator
{
    function hammingWeight(int $n): int
    {
        $count = 0;
        while ($n > 0) {
            $n = $n & ($n - 1);
            $count += 1;
        }

        return $count;
    }
}