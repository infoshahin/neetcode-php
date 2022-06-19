<?php

// URL: https://leetcode.com/problems/same-tree/

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
    function isSameTree(?TreeNode $p, ?TreeNode $q): bool
    {
        if ($p === null && $q === null) return true;
        if ($p === null || $q === null) return false;

        if ($p->val === $q->val) {
            return $this->isSameTree($p->left, $q->left) && $this->isSameTree($p->right, $q->right);
        }

        return false;
    }
}