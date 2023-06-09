<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Post;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $postCount = Post::where('user_id', auth()->user()->id)->count();
        # feedbacks made by user
        $userFeedbacksMade = Feedback::where('user_id', auth()->user()->id)->count();
        # feedbacks to my account
        $userFeedbacksGot = auth()->user()->feedbacks->count();
        # all feedbacks on user posts
        $postFeedbacks = Feedback::whereHasMorph('feedbackable', [Post::class], function ($query) {$query->where('user_id', auth()->user()->id);})->count();

        return Inertia::render('Dashboard', compact(['userFeedbacksMade', 'userFeedbacksGot', 'postFeedbacks', 'postCount']));
    }
}
