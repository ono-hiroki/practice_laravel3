<?php

namespace App\Services;

use App\Models\Tweet;

class TweetService
{
    public function getTweets()
    {
        return Tweet::OrderBy('created_at', 'desc')->get();
    }
}
