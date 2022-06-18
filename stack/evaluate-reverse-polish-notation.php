<?php

// URL: https://leetcode.com/problems/evaluate-reverse-polish-notation/

class Solution
{
    /**
     * @param string[] $tokens
     */
    function evalRPN(array $tokens): int
    {
        $stack = new SplStack();

        foreach ($tokens as $el) {
            if (is_numeric($el)) {
                $stack->push((int) $el);
            } else {
                $num1 = $stack->pop();

                $result = match ($el) {
                    '+' => $stack->pop() + $num1,
                    '-' => $stack->pop() - $num1,
                    '*' => $stack->pop() * $num1,
                    '/' => (int) ($stack->pop() / $num1),
                };

                $stack->push((int) $result);
            }
        }

        return $stack->top();
    }
}