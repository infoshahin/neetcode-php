<?php

// URL: https://leetcode.com/problems/gas-station/

class Solution
{
    /**
     * @param int[] $gas
     * @param int[] $cost
     */
    function canCompleteCircuit(array $gas, array $cost): int
    {
        if (array_sum($cost) > array_sum($gas)) {
            return -1;
        }

        $total = 0;
        $result = 0;
        for ($i = 0; $i < count($gas); $i++) {
            $total += $gas[$i] - $cost[$i];

            if ($total < 0) {
                $total = 0;
                $result = $i + 1;
            }
        }

        return $result;
    }
}