<?php

// URL: https://leetcode.com/problems/clone-graph/


class Node {
    public $val = null;
    public $neighbors = null;
    function __construct($val = 0) {
        $this->val = $val;
        $this->neighbors = array();
    }
}

class Solution
{
    private array $visited = [];

    function cloneGraph(?Node $node): ?Node
    {
        if ($node === null) {
            return $node;
        }

        if ($this->visited[$node->val] !== null) {
            return $this->visited[$node->val];
        }

        $copy = new Node($node->val);
        $this->visited[$node->val] = $copy;

        foreach ($node->neighbors as $neighbor) {
            $copy->neighbors[] = $this->cloneGraph($neighbor);
        }

        return $copy;
    }
}