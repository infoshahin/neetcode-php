<?php

// URL: https://leetcode.com/problems/validate-binary-search-tree/

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
    function isValidBST(?TreeNode $root): bool
    {
        return $this->dfs($root, PHP_INT_MIN, PHP_INT_MAX);
    }

    function dfs(?TreeNode $root, int $min, int $max): bool
    {
        if ($root === null) return true;

        if ($root->val <= $min  || $root->val >= $max) {
            return false;
        }

        return $this->dfs($root->left, $min, $root->val) &&
            $this->dfs($root->right, $root->val, $max);
    }
}