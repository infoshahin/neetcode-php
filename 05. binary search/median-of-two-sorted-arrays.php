<?php

// URL: https://leetcode.com/problems/median-of-two-sorted-arrays/

class Solution
{
    /**
     * @param int[] $nums1
     * @param int[] $nums2
     */
    function findMedianSortedArrays(array $nums1, array $nums2): float
    {
        $nums = array_merge($nums1, $nums2);
        sort($nums);

        $count = count($nums);
        if ($count % 2 === 0) {
            return ($nums[intdiv($count, 2) - 1] + $nums[intdiv($count,
                2
            )]) / 2;
        } else {
            return $nums[$count / 2];
        }
    }
}