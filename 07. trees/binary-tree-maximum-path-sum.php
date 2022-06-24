<?php

// URL: https://leetcode.com/problems/binary-tree-maximum-path-sum/

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
    function maxPathSum(?TreeNode $root): int
    {
        return $this->dfs($root)[0];
    }

    function dfs(?TreeNode $node): array
    {
        if ($node === null) {
            return [PHP_INT_MIN, PHP_INT_MIN];
        }

        $right = $this->dfs($node->right);
        $left = $this->dfs($node->left);

        $connected = max(max($right[1] + $node->val, $left[1] + $node->val), $node->val);
        $disconnected = max(max($right[0], $left[0]), max($right[1] + $left[1] + $node->val, $connected));

        return [$disconnected, $connected];
    }
}