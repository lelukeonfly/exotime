<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

// use App\Http\Requests\StoreBanRequest;
// use App\Http\Requests\UpdateBanRequest;
// use App\Models\Ban;

class BanController extends Controller
{

  public function __invoke()
  {
    // return Inertia::render('Banned', [
    //   'ban_count' => auth()->user()->ban_count,
    //   'is_banned' => auth()->user()->is_banned,
    // ]);
    # if user is banned permanent:
    # output all bans & unbans
    # time = permanent
    # link for unban request
    #
    # if user is banned temporary:
    # output ban with reason
    # time = now() - banned_until
    # link for unban request
    #
    # bans in array
    #


    $bans = auth()->user()->bans;
    $permanent = auth()->user()->permanently_banned;

    // if (auth()->user()->permanently_banned) {
    //   return Inertia::render('Banned', compact('bans'));
    // }
    return Inertia::render('Banned', compact('bans', 'permanent'));
  }
}
