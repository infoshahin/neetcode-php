<?php

// URL: https://leetcode.com/problems/coin-change/

class Solution
{
    /**
     * @param int[] $coins
     */
    function coinChange(array $coins, int $amount): int
    {
        if (in_array($amount, $coins)) {
            return 1;
        }

        $dp = [];
        $dp[0] = 0;

        for ($i = 1; $i <= $amount; $i++) {
            $num = -1;

            foreach ($coins as $coin) {
                if ($i < $coin) {
                    continue;
                } else if ($i == $coin) {
                    $num = 1;
                    break;
                } else {
                    if ($dp[$i - $coin] < 0) {
                        continue;
                    }

                    if ($num < 0 || $num > $dp[$i - $coin] + 1) {
                        $num = $dp[$i - $coin] + 1;
                    }
                }
            }
            $dp[$i] = $num;
        }

        return $dp[$amount];
    }
}