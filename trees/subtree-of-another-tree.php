<?php

// URL: https://leetcode.com/problems/subtree-of-another-tree/

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
    function isSubtree(?TreeNode $root, ?TreeNode $subRoot): bool
    {
        if ($root === null) return false;
        if ($this->isSame($root, $subRoot)) return true;

        return $this->isSubtree($root->left, $subRoot) || $this->isSubtree($root->right, $subRoot);
    }

    function isSame(?TreeNode $tree1, ?TreeNode $tree2): bool
    {
        if ($tree1 === null && $tree2 === null) return true;
        if ($tree1 === null || $tree2 === null) return false;

        if ($tree1->val === $tree2->val) {
            return $this->isSame($tree1->left, $tree2->left) && $this->isSame($tree1->right, $tree2->right);
        }

        return false;
    }
}