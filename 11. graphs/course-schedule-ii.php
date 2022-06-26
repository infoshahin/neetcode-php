<?php

// URL: https://leetcode.com/problems/course-schedule-ii/

class Solution
{
    private array $result = [];
    private array $visit = [];
    private array $cycle = [];
    private array $preMap = [];

    /**
     * @param int $numCourses
     * @param int[][] $prerequisites
     * @return int[]
     */
    function findOrder(int $numCourses, array $prerequisites): array
    {
        foreach ($prerequisites as $prerequisite) {
            [$course, $pre] = $prerequisite;
            $this->preMap[$course][] = $pre;
        }

        for ($crs = 0; $crs < $numCourses; $crs++) {
            if (!$this->dfs($crs)) {
                return [];
            }
        }
        
        return $this->result;
    }

    function dfs(int $course): bool
    {
        if (in_array($course, $this->cycle)) {
            return false;
        }

        if (in_array($course, $this->visit)) {
            return true;
        }

        array_push($this->cycle, $course);
        foreach ($this->preMap[$course] as $crs) {
            if (!$this->dfs($crs)) {
                return false;
            }
        }
        array_pop($this->cycle);
        array_push($this->visit, $course);
        
        $this->result[] = $course;

        return true;
    }
}