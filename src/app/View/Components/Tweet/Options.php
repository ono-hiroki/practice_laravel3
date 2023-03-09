<?php

namespace App\View\Components\Tweet;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Options extends Component
{
   private int $tweetId;
   private int $userId;

    public function __construct(int $tweetId, int $userId)
    {
        $this->tweetId = $tweetId;
        $this->userId = $userId;
    }

    public function render()
    {
        $tweetId = $this->tweetId;
        $userId = $this->userId;
        $myTweet = $this->userId === auth()->id();
        return view('components.tweet.options',compact('tweetId','userId','myTweet'));
    }
}
