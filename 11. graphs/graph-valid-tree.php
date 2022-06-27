<?php

// URL: https://leetcode.com/problems/graph-valid-tree/
// URL: https://www.lintcode.com/problem/178/

class Solution
{
    private array $adjacencyList = [];
    private array $visit = [];

    /**
     * @param int $n
     * @param int[][] $edges
     * @return bool
     */
    function valid_tree(int $n, array $edges): bool
    {
        if ($n === 0) {
            return true;
        }

        foreach ($edges as $edge) {
            [$n1, $n2] = $edge;
            $this->adjacencyList[$n1][] = $n2;
            $this->adjacencyList[$n2][] = $n1;
        }

        return $this->dfs(0, -1) && $n === count($this->visit);
    }

    function dfs(int $node, int $previous): bool
    {
        if (in_array($node, $this->visit)) {
            return false;
        }

        $this->visit[] = $node;
        foreach ($this->adjacencyList[$node] as $n) {
            if ($n === $previous) {
                continue;
            }
            if ($this->dfs($n, $node) === false) {
                return false;
            }
        }
        return true;
    }
}