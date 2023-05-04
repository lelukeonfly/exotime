<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;


class PostRequestController extends Controller
{

    public function storeRequest(Post $post){
        $this->authorize('makeRequest', $post);

        $user = auth()->user();

        if ($post && $user) {
            if (!$post->requestedByUsers->contains($user)) {
                $post->requestedByUsers()->attach($user, ['status' => 'pending']);
            }
        }

    }

    public function acceptRequest(Post $post, User $user)
    {
        $this->authorize('acceptRequest', $post);

        if ($post && $user) {
            $post->requestedByUsers()->updateExistingPivot($user->id, ['status' => 'accepted']);
        }

    }

    public function rejectRequest(Post $post, User $user)
    {
        $this->authorize('rejectRequest', $post);

        if ($post && $user) {
            $post->requestedByUsers()->updateExistingPivot($user->id, ['status' => 'rejected']);
        }
    }
}
