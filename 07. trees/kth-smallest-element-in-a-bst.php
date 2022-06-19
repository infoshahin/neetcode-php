<?php

// URL: https://leetcode.com/problems/kth-smallest-element-in-a-bst/

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */

class Solution
{
    private SplMaxHeap $heap;
    private int $k;

    function kthSmallest(?TreeNode $root, int $k): int
    {
        $this->heap = new SplMaxHeap();
        $this->k = $k;

        $this->dfs($root);

        return (int) $this->heap->top();
    }

    function dfs(?TreeNode $root): void
    {
        if ($root === null) return;

        if ($this->heap->count() < $this->k) {
            $this->heap->insert($root->val);
        } else if ($this->heap->top() > $root->val) {
            $this->heap->extract();
            $this->heap->insert($root->val);
        } else {
        }

        $this->dfs($root->left);
        $this->dfs($root->right);
    }
}