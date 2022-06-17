<?php

// URL: https://leetcode.com/problems/binary-tree-right-side-view/

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
     * @return int[]
     */
    function rightSideView(?TreeNode $root): array
    {
        $this->dfs($root, 0);

        return $this->result;
    }

    function dfs(?TreeNode $root, int $level): void
    {
        if ($root === null) return;

        $this->result[$level] = $root->val;  // assign the right most element of each level
        $level++;

        $this->dfs($root->left, $level);
        $this->dfs($root->right, $level);
    }
}

class SolutionUsingBFS
{
    private array $result = [];

    /**
     * @param TreeNode $root
     * @return int[]
     */
    function rightSideView(?TreeNode $root): array
    {
        $this->bfs($root);

        return $this->result;
    }

    function bfs(?TreeNode $root): void
    {
        if ($root === null) return;

        $queue = [];
        $queue[] = $root;

        while (!empty($queue)) {
            $size = count($queue);
            $currentVal = $queue[$size - 1]->val;

            for ($i = 0; $i < $size; $i++) {
                $currentNode = array_shift($queue);

                if ($currentNode->left !== null) {
                    $queue[] = $currentNode->left;
                }

                if ($currentNode->right !== null) {
                    $queue[] = $currentNode->right;
                }
            }

            $this->result[] = $currentVal;
        }
    }
}