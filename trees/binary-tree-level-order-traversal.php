<?php

// URL: https://leetcode.com/problems/binary-tree-level-order-traversal/

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

class SolutionUsingDFS
{
    private array $result = [];

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrder(?TreeNode $root): array
    {
        $this->dfs($root, 0);

        return $this->result;
    }

    function dfs(?TreeNode $root, int $level): void
    {
        if ($root === null) return;

        $this->result[$level][] = $root->val;
        $level++;

        $this->dfs($root->left, $level);
        $this->dfs($root->right, $level);
        $level--;
    }
}

class SolutionUsingBFS
{
    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrder(?TreeNode $root): array
    {
        return $this->bfs($root);
    }

    function bfs(?TreeNode $root): array
    {
        $result = [];
        if ($root === null) return $result;

        $queue = [];
        $queue[] = $root;

        while (!empty($queue)) {
            $currentLevelValues = [];

            $size = count($queue);  // don't do it inline, as we insert more item in queue 
            for ($i = 0; $i < $size; $i++) {
                $currentNode = array_shift($queue);
                $currentLevelValues[] = $currentNode->val;

                if ($currentNode->left !== null) {
                    $queue[] = $currentNode->left;
                }

                if ($currentNode->right !== null) {
                    $queue[] = $currentNode->right;
                }
            }

            $result[] = $currentLevelValues;
        }

        return $result;
    }
}