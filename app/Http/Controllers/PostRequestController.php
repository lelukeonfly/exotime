<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;


class PostRequestController extends Controller
{

    public function storeRequest(Post $post){
        $this->authorize('makeRequest', $post);

        $user = auth()->user();

        if (!$post || !$user) {
            return redirect()->back()->withErrors(['request' => 'No Post or User provided!']);
        }

        if (!$post->requestedByUsers->contains($user)) {
            $post->requestedByUsers()->attach($user, ['status' => 'pending']);
            return redirect()->back()->with(['message' => 'Successfully requested!', 'type' => 'success']);
        }

        return redirect()->back()->withErrors(['request' => 'Already requested!']);
    }

    public function acceptRequest(Post $post, User $user)
    {
        $this->authorize('acceptRequest', $post);

        if (!$post || !$user) {
            return redirect()->back()->withErrors('request', 'No Post or User provided!');
        }

        $post->requestedByUsers()->updateExistingPivot($user->id, ['status' => 'accepted']);

        return redirect()->back()->with('message', 'Successfully accepted User Request!');
    }

    public function rejectRequest(Post $post, User $user)
    {
        $this->authorize('rejectRequest', $post);

        if (!$post || !$user) {
            return redirect()->back()->withErrors('request', 'No Post or User provided!');
        }

        $post->requestedByUsers()->updateExistingPivot($user->id, ['status' => 'rejected']);

        return redirect()->back()->with('message', 'Successfully rejected User Request!');
    }
}
