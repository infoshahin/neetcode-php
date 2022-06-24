<?php

// URL: https://leetcode.com/problems/serialize-and-deserialize-binary-tree/

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */

class Codec
{
    function __construct()
    {
    }

    /**
     * @param TreeNode $root
     * @return String
     */
    function serialize(?TreeNode $root): string
    {
        $result = [];
        $this->serializeDfs($root, $result);

        return json_encode($result);
    }

    /**
     * @param String $data
     * @return TreeNode
     */
    function deserialize(string $data): ?TreeNode
    {
        $values = json_decode($data);
        $n = 0;

        return $this->deserializeDfs($values, $n);
    }

    function serializeDfs(?TreeNode $root, array &$result): void
    {
        if ($root === null) {
            $result[] = null;
            return;
        }

        $result[] = $root->val;
        $this->serializeDfs($root->left, $result);
        $this->serializeDfs($root->right, $result);
    }

    function deserializeDfs(array $values, int &$n): ?TreeNode
    {
        $val = $values[$n++];

        if ($val === null) {
            return null;
        }

        $root = new TreeNode($val);
        $root->left = $this->deserializeDfs($values, $n);
        $root->right = $this->deserializeDfs($values, $n);

        return $root;
    }
}

/**
 * Your Codec object will be instantiated and called as such:
 * $ser = Codec();
 * $deser = Codec();
 * $data = $ser->serialize($root);
 * $ans = $deser->deserialize($data);
 */