<?php

// URL: https://leetcode.com/problems/design-twitter/

class Tweet
{
    public int $tweetId;
    public int $timestamp;

    function __construct(int $tweetId, int $timestamp)
    {
        $this->tweetId = $tweetId;
        $this->timestamp = $timestamp;
    }

    // needed for array_unique
    function __toString(): string
    {
        return $this->tweetId;
    }
}

class Twitter
{
    private static int $timestamp = 1;
    private const MAX_TWEET = 10;

    private $userMap = [];
    private $followee = [];
    private $tweets = [];

    function __construct()
    {
    }

    function postTweet(int $userId, int $tweetId): void
    {
        if (!in_array($userId, $this->tweets)) {
            $this->follow($userId, $userId);    // follow himself
        }

        // $timestamp = self::$timestamp++;
        $this->tweets[$userId][] = new Tweet($tweetId, self::$timestamp++);
    }

    /**
     * @return int[]
     */
    function getNewsFeed(int $userId): array
    {
        $feed = [];

        $myFollowers = $this->followee[$userId];

        foreach ($myFollowers as $follower) {
            $tweets = $this->tweets[$follower];

            foreach ($tweets as $tweet) {
                $feed[] = $tweet;
            }
        }

        $feed = array_unique($feed);

        usort($feed, function ($t1, $t2) {
            if ($t1->timestamp == $t2->timestamp) return 0;
            return ($t1->timestamp > $t2->timestamp) ? -1 : 1;
        });

        $feed = array_slice($feed, 0, self::MAX_TWEET);

        $result = [];
        foreach ($feed as $tweet) {
            $result[] = $tweet->tweetId;
        }

        return $result;
    }

    function follow(int $followerId, int $followeeId): void
    {
        $this->followee[$followerId][] = $followeeId;
    }

    function unfollow(int $followerId, int $followeeId)
    {
        if (in_array($followeeId, $this->followee[$followerId])) {
            $key = array_search($followeeId, $this->followee[$followerId]);
            unset($this->followee[$followerId][$key]);
        }
    }
}

/**
 * Your Twitter object will be instantiated and called as such:
 * $obj = Twitter();
 * $obj->postTweet($userId, $tweetId);
 * $ret_2 = $obj->getNewsFeed($userId);
 * $obj->follow($followerId, $followeeId);
 * $obj->unfollow($followerId, $followeeId);
 */