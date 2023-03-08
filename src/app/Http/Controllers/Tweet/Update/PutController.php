<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tweet\UpdateRequest;
use App\Models\Tweet;
use App\Services\TweetService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, TweetService $tweetService)
    {
        if (!$tweetService->checkOwnTweet($request->user()->id, $request->id())) {
            throw new NotFoundHttpException();
        }
        $tweet = Tweet::where('id', $request->id())->firstorFail();
        $tweet->content = $request->tweet();
        $tweet->save();
        return redirect()->route('tweet.update.index', ['tweetId' => $tweet->id])
            ->with('feedback.success', 'つぶやきを更新しました');
    }
}
