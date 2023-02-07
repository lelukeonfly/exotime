<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;

// use App\Http\Requests\StoreBanRequest;
// use App\Http\Requests\UpdateBanRequest;
// use App\Models\Ban;

class BanController extends Controller
{

  public function __invoke()
  {
    $bans = auth()->user()->bannable;

    $current = $bans->first();

    $previous = $bans->except($current->id);

    return Inertia::render('Banned', compact('current', 'previous'));
  }
}
