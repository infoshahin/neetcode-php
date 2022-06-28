<?php

// URL: https://leetcode.com/problems/merge-triplets-to-form-target-triplet/

class Solution
{
    /**
     * @param int[][] $triplets
     * @param int[] $target
     */
    function mergeTriplets(array $triplets, array $target): bool {
        $good = [];

        foreach ($triplets as $triplet) {
            if ($triplet[0] > $target[0] || $triplet[1] > $target[1] || $triplet[2] > $target[2]) {
                continue;
            }

            foreach ($triplet as $index => $val) {
                if ($val === $target[$index]) {
                    $good[$index] = true;
                }
            }
        }

        return count($good) === 3;
    }
}