<?php

// URL: https://leetcode.com/problems/lowest-common-ancestor-of-a-binary-search-tree/submissions/

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */

class Solution
{
    function lowestCommonAncestor(TreeNode $root, TreeNode $p, TreeNode $q): TreeNode
    {
        if ($p->val > $root->val && $q->val > $root->val) {
            return $this->lowestCommonAncestor($root->right, $p, $q);
        } else if ($p->val < $root->val && $q->val < $root->val) {
            return $this->lowestCommonAncestor($root->left, $p, $q);
        } else {
            // we don't check anythig else as the question gurantees p and q exists
            return $root;
        }
    }
}