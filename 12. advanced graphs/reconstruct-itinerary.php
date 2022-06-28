<?php

// URL: https://leetcode.com/problems/reconstruct-itinerary/

class Solution
{
    private $lenght = 0;

    function dfs(array $tickets, string $city, array $path)
    {
        $last = end($path);
        $tk = [$last, $city];

        $pos = array_search($tk, $tickets);
        if ($pos !== false) {
            unset($tickets[$pos]);
        }

        $path[] = $city;
        if (count($path) === $this->lenght + 1) {
            return $path;
        }

        foreach ($tickets as $ticket) {
            [$src, $dest] = $ticket;
            if ($src === $city) {
                $result = $this->dfs($tickets, $dest, $path);
                if ($result) {
                    return $result;
                }
            }
        }

        return false;
    }

    /**
     * @param string[][] $tickets
     * @return string[]
     */
    function findItinerary(array $tickets): array
    {
        sort($tickets);
        $this->lenght = count($tickets);
        return $this->dfs($tickets, "JFK", []);
    }
}