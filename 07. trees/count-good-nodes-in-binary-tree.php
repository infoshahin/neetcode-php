<?php

// URL: https://leetcode.com/problems/count-good-nodes-in-binary-tree/

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
    private int $count = 0;

    function goodNodes(?TreeNode $root): int
    {
        $this->dfs($root, PHP_INT_MIN);

        return $this->count;
    }

    function dfs(?TreeNode $root, int $maxValue)
    {
        if ($root === null) return;

        if ($root->val >= $maxValue) {
            $maxValue = $root->val;
            $this->count++;
        }

        $this->dfs($root->left, $maxValue);
        $this->dfs($root->right, $maxValue);
    }
}