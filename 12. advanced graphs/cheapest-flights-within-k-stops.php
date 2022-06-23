<?php

// URL: https://leetcode.com/problems/cheapest-flights-within-k-stops/

class Solution
{
    /**
     * @param int[][] $flights
     */
    function findCheapestPrice(int $n, array $flights, int $src, int $dst, int $k): int
    {
        $prev = array_fill(0, $n, PHP_INT_MAX);
        $next = array_fill(0, $n, PHP_INT_MAX);

        $prev[$src] = 0;
        $next[$src] = 0;

        for ($i = 0; $i < $k + 1; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $prev[$j] = $next[$j];
            }

            foreach ($flights as $flight) {
                [$source, $destination, $cost] = $flight;

                if ($prev[$source] !== PHP_INT_MAX && $next[$destination] > $prev[$source] + $cost) {
                    $next[$destination] = $prev[$source] + $cost;
                }
            }
        }

        return ($next[$dst] === PHP_INT_MAX) ? -1 : $next[$dst];
    }
}