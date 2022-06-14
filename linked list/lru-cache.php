<?php

// URL: https://leetcode.com/problems/lru-cache/

class LRUCache
{
    protected int $capacity;
    protected array $data = [];

    public function __construct(int $capacity)
    {
        $this->capacity = $capacity;
    }

    public function get(int $key): int
    {
        if (! (isset($this->data[$key]) || array_key_exists($key, $this->data))) {
            return -1;
        }

        $this->moveToEnd($key);

        return end($this->data);
    }

    public function put(int $key, int $value): void
    {
        if ($this->get($key) !== -1) {
            array_pop($this->data);
        }


        if (count($this->data) === $this->capacity) {
            reset($this->data);
            unset($this->data[key($this->data)]);
        }

        $this->data[$key] = $value;
    }

    protected function moveToEnd(int $key)
    {
        $values = $this->data[$key];
        unset($this->data[$key]);
        $this->data[$key] = $values;
    }
}

/**
 * Your LRUCache object will be instantiated and called as such:
 * $obj = LRUCache($capacity);
 * $ret_1 = $obj->get($key);
 * $obj->put($key, $value);
 */