<?php

// URL: https://leetcode.com/problems/construct-binary-tree-from-preorder-and-inorder-traversal/

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
    /**
     * @param int[] $preorder
     * @param int[] $inorder
     * @return TreeNode
     */
    function buildTree(array $preorder, array $inorder): ?TreeNode
    {
        if (empty($preorder)) return null;

        $root = array_shift($preorder);
        $position = array_search($root, $inorder);

        return new TreeNode(
            $root,
            $this->buildTree(array_slice($preorder, 0, $position), array_slice($inorder, 0, $position)),
            $this->buildTree(array_slice($preorder, $position), array_slice($inorder, $position + 1))
        );
    }
}