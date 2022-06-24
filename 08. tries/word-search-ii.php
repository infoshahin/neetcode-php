<?php

// Remarks: Time Limit Exceeded
// URL: https://leetcode.com/problems/word-search-ii/

class TrieNode
{
    public array $children;
    public bool $isWord;

    function __construct()
    {
        $this->children = [];
        $this->isWord = false;
    }
}

class Trie
{
    public TrieNode $root;

    function __construct()
    {
        $this->root = new TrieNode;
    }

    function addWord(string $word): void
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

        $pointer->isWord = true;
    }
}

class Solution
{
    private Trie $trie;
    private array $result = [];
    private array $board;

    /**
     * @param string[][] $board
     * @param string[] $words
     * @return string[]
     */
    function findWords(array $board, array $words): array
    {
        $this->trie = new Trie();
        $this->board = $board;

        foreach ($words as $word) {
            $this->trie->addWord($word);
        }

        for ($r = 0; $r < count($board); $r++) {
            for ($c = 0; $c < count($board[0]); $c++) {
                $this->dfs($r, $c, $this->trie->root, [], "");
            }
        }

        return array_unique($this->result);
    }

    function dfs(int $row, int $col, TrieNode $node, array $paths, string $word)
    {
        if (
            $row < 0 ||
            $col < 0 ||
            $row >= count($this->board) ||
            $col >= count($this->board[0]) ||
            !array_key_exists($this->board[$row][$col], $node->children) ||
            array_key_exists("$row-$col", $paths)
        ) {
            return;
        }

        $paths["$row-$col"] = true;
        $node = $node->children[$this->board[$row][$col]];
        $word .= $this->board[$row][$col];

        if ($node->isWord) {
            $this->result[] = $word;
        }

        $this->dfs($row + 1, $col, $node, $paths, $word);
        $this->dfs($row - 1, $col, $node, $paths, $word);
        $this->dfs($row, $col + 1, $node, $paths, $word);
        $this->dfs($row, $col - 1, $node, $paths, $word);

        unset($paths["$row-$col"]);
    }
}