<?php

// URL: https://leetcode.com/problems/min-cost-to-connect-all-points/

class Solution
{
    /**
     * @param int[][] $points
     */
    function minCostConnectPoints(array $points): int
    {
        $n = count($points);
        $mstCost = 0;
        $edgesUsed = 0;

        // Track nodes which are visited.
        $inMST = [];
        $minDist = [];
        for ($i = 0; $i < $n; $i++) {
            $inMST[$i] = false;
            $minDist[$i] = PHP_INT_MAX;
        }

        $minDist[0] = 0;
        while ($edgesUsed < $n) {
            $currMinEdge = PHP_INT_MAX;
            $currNode = 0;

            // Pick least weight node which is not in MST.
            for ($i = 0; $i < $n; ++$i) {
                if (!$inMST[$i] && $currMinEdge > $minDist[$i]
                ) {
                    $currMinEdge = $minDist[$i];
                    $currNode = $i;
                }
            }

            $mstCost += $currMinEdge;
            $edgesUsed++;
            $inMST[$currNode] = true;

            // Update adjacent nodes of current node.
            for ($j = 0; $j < $n; ++$j) {
                $weight = abs($points[$currNode][0] - $points[$j][0]) +
                    abs($points[$currNode][1] - $points[$j][1]);
                if (!$inMST[$j] && $minDist[$j] > $weight) {
                    $minDist[$j] = $weight;
                }
            }
        }

        return $mstCost;
    }
}