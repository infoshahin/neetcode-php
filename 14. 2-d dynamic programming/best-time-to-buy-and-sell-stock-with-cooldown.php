<?php

// URL: https://leetcode.com/problems/best-time-to-buy-and-sell-stock-with-cooldown/

class Solution
{
    /**
     * @param int[] $prices
     */
    function maxProfit(array $prices): int
    {
        $sold = $cold = [0];
        for ($i = 1; $i < count($prices); $i++) {
            $sold[$i] = max($sold[$i - 1], $cold[$i - 2]) + $prices[$i] - $prices[$i - 1];
            $cold[$i] = max($sold[$i - 1], $cold[$i - 1]);
        }
        return max($sold[$i - 1], $cold[$i - 1]);
    }
}