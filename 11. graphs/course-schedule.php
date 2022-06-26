<?php

// URL: https://leetcode.com/problems/course-schedule/

class Solution
{
    private array $visit = [];
    private array $preMap = [];

    /**
     * @param int $numCourses
     * @param int[][] $prerequisites
     * @return bool
     */
    function canFinish(int $numCourses, array $prerequisites): bool
    {
        foreach ($prerequisites as $prerequisite) {
            [$course, $pre] = $prerequisite;
            $this->preMap[$course][] = $pre;
        }

        for ($crs = 0; $crs < $numCourses;
            $crs++
        ) {
            if (!$this->dfs($crs)) {
                return false;
            }
        }
        return true;
    }

    function dfs(int $course): bool
    {
        if (in_array($course, $this->visit)) {
            return false;
        }

        if (empty($this->preMap[$course])) {
            return true;
        }

        array_push($this->visit, $course);
        foreach ($this->preMap[$course] as $crs) {
            if (!$this->dfs($crs)) {
                return false;
            }
        }
        array_pop($this->visit);
        $this->preMap[$course] = [];

        return true;
    }
}