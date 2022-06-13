<?php

// URL: https://leetcode.com/problems/maximum-depth-of-binary-tree/

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
    function maxDepth(?TreeNode $root): int
    {
        if ($root == null) return 0;

        $left = $this->maxDepth($root->left);
        $right = $this->maxDepth($root->right);

        return max($left, $right) + 1;
    }
}