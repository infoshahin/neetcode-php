<?php

// URL: https://leetcode.com/problems/redundant-connection/

class Solution
{
    private array $parent;
    private array $rank;

    /**
     * @param int[][] $edges
     * @return int[]
     */
    function findRedundantConnection(array $edges): array
    {
        $this->parent = array_combine(
            range(1, count($edges)),
            range(1, count($edges))
        );
        $this->rank = array_fill(0, count($edges), 1);

        foreach ($edges as $edge) {
            [$n1, $n2] = $edge;

            if ($this->union($n1, $n2) === false) {
                return [$n1, $n2];
            }
        }
    }

    function find(int $n): int
    {
        $parent = $this->parent[$n];

        while ($parent != $this->parent[$parent]) {
            $this->parent[$parent] = $this->parent[$this->parent[$parent]];
            $parent = $this->parent[$parent];
        }

        return $parent;
    }

    function union(int $n1, int $n2): bool {
        $parent1 = $this->find($n1);
        $parent2 = $this->find($n2);

        if ($parent1 === $parent2) {
            return false;
        }

        if ($this->rank[$parent1] > $this->rank[$parent2]) {
            $this->parent[$parent2] = $parent1;
            $this->rank[$parent1] += $this->rank[$parent2];
        } else {
            $this->parent[$parent1] = $parent2;
            $this->rank[$parent2] += $this->rank[$parent1];
        }

        return true;
    }
}