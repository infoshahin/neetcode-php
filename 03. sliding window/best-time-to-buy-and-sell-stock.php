<?php

// URL: https://leetcode.com/problems/best-time-to-buy-and-sell-stock/

class Solution
{
    /**
     * @param int[] $prices
     */
    function maxProfit(array $prices): int
    {
        $min = $prices[0];
        $max = 0;

        for ($i = 1; $i < count($prices); $i++) {
            if ($prices[$i] - $min > $max) {
                $max = $prices[$i] - $min;
            }

            if ($prices[$i] < $min) {
                $min = $prices[$i];
            }
        }

        return $max;
    }
}