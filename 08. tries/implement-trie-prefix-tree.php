<?php

// URL: https://leetcode.com/problems/implement-trie-prefix-tree/

class TrieNode
{
    public $children;
    public $endOfWord;

    function __construct()
    {
        $this->children = [];
        $this->endOfWord = false;
    }
}

class Trie
{
    protected $root;

    function __construct()
    {
        $this->root = new TrieNode();
    }

    /**
     * @param String $word
     * @return NULL
     */
    function insert(string $word)
    {
        $wordArray = str_split($word);

        $pointer = $this->root;
        foreach ($wordArray as $char) {
            if (array_key_exists($char, $pointer->children)) {
                $pointer = $pointer->children[$char];
                continue;
            }

            $pointer->children[$char] = new TrieNode();
            $pointer = $pointer->children[$char];
        }

        $pointer->endOfWord = true;
    }

    /**
     * @param String $word
     * @return Boolean
     */
    function search(string $word): bool
    {
        $wordArray = str_split($word);

        $pointer = $this->root;
        foreach ($wordArray as $char) {
            if (!array_key_exists($char, $pointer->children)) {
                return false;
            }
            $pointer = $pointer->children[$char];
        }

        return $pointer->endOfWord;
    }

    /**
     * @param String $prefix
     * @return Boolean
     */
    function startsWith(string $prefix): bool
    {
        $wordArray = str_split($prefix);

        $pointer = $this->root;
        foreach ($wordArray as $char) {
            if (!array_key_exists($char, $pointer->children)) {
                return false;
            }
            $pointer = $pointer->children[$char];
        }

        return true;
    }
}

/**
 * Your Trie object will be instantiated and called as such:
 * $obj = Trie();
 * $obj->insert($word);
 * $ret_2 = $obj->search($word);
 * $ret_3 = $obj->startsWith($prefix);
 */