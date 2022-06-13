<?php

// URL: https://leetcode.com/problems/invert-binary-tree/

class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

class Solution
{
    /**
     * @param TreeNode $root
     * @return TreeNode
     */
    function invertTree(TreeNode $root): TreeNode
    {
        if ($root !== null) {
            [$root->left, $root->right] = [$this->invertTree($root->right), $this->invertTree($root->left)];
        }

        return $root;
    }
}