<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;


class PostRequestController extends Controller
{

    public function storeRequest($postId){
        $post = Post::find($postId);
        $user = auth()->user();

        if ($post && $user) {
            if (!$post->requestedByUsers->contains($user)) {
                $post->requestedByUsers()->attach($user, ['status' => 'pending']);
            }
        }

    }

    public function acceptRequest($postId, $userId)
    {
        $post = Post::find($postId);
        $user = User::find($userId);

        if ($post && $user) {
            $post->requestedByUsers()->updateExistingPivot($user->id, ['status' => 'accepted']);
        }

    }

    public function rejectRequest($postId, $userId)
    {
        $post = Post::find($postId);
        $user = User::find($userId);

        if ($post && $user) {
            $post->requestedByUsers()->updateExistingPivot($user->id, ['status' => 'rejected']);

        }
    }
}
