<?php

// URL: https://leetcode.com/problems/balanced-binary-tree/

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
    function isBalanced(?TreeNode $root): bool
    {
        if ($root == null) return true;
        if (!$this->isBalanced($root->left)) return false;
        if (!$this->isBalanced($root->right)) return false;

        return abs($this->getDepth($root->left) - $this->getDepth($root->right)) <= 1;
    }

    function getDepth(?TreeNode $root): int
    {
        if ($root == null) return 0;
        if ($root->left == null && $root->right == null) return 1;

        return max($this->getDepth($root->left), $this->getDepth($root->right)) + 1;
    }
}