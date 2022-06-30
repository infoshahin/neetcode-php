<?php

// URL: https://leetcode.com/problems/coin-change-2/

class Solution
{
    /**
     * @param int[] $coins
     */
    function change(int $amount, array $coins): int
    {
        $dp = array_fill(0, $amount + 1, 0);
        $dp[0] = 1;

        for ($i = count($coins) - 1; $i >= 0; $i--) {
            $nextDp = array_fill(0, $amount + 1, 0);
            $nextDp[0] = 1;

            for ($j = 1; $j <= $amount; $j++) {
                $nextDp[$j] =  $dp[$j];

                if ($j - $coins[$i] >= 0
                ) {
                    $nextDp[$j] += $nextDp[$j - $coins[$i]];
                }
            }
            $dp = $nextDp;
        }

        return $dp[$amount];
    }
}