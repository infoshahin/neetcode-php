<?php

// URL: https://leetcode.com/problems/diameter-of-binary-tree/

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
    private $diameter = 0;

    function diameterOfBinaryTree(?TreeNode $root): int
    {
        $this->getDepth($root);

        return $this->diameter;
    }

    function getDepth(?TreeNode $root): int
    {
        if ($root == null) return 0;

        $left = $this->getDepth($root->left);
        $right = $this->getDepth($root->right);

        $this->diameter = max($this->diameter, $left + $right);

        return max($left, $right) + 1;
    }
}