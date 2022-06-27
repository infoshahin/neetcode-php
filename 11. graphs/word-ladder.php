<?php

// URL: https://leetcode.com/problems/word-ladder/

class Solution
{
    /**
     * @param String[] $wordList
     */
    function ladderLength(string $beginWord, string $endWord, array $wordList): int
    {
        if (!in_array($endWord, $wordList)) {
            return 0;
        }

        // adjacency list
        $wordList[] = $beginWord;
        $neighbour = [];
        foreach ($wordList as $word) {
            for ($j = 0; $j < strlen($word); $j++) {
                $pattern = $word;
                $pattern[$j] = '*';
                $neighbour[$pattern][] = $word;
            }
        }

        // BFS
        $visit[] = $beginWord;
        $queue[] = $beginWord;
        $result = 1;
        while (!empty($queue)) {
            $count = count($queue);

            for ($i = 0; $i < $count; $i++) {
                $word = array_shift($queue);
                if ($word === $endWord) {
                    return $result;
                }

                for ($j = 0; $j < strlen($word); $j++) {
                    $pattern = $word;
                    $pattern[$j] = '*';

                    foreach ($neighbour[$pattern] as $neibourWord) {
                        if (!in_array($neibourWord, $visit)) {
                            $visit[] = $neibourWord;
                            $queue[] = $neibourWord;
                        }
                    }
                }
            }

            $result++;
        }

        return 0;
    }
}