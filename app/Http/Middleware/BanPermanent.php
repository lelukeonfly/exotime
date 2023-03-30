<?php

namespace App\Http\Middleware;

use App\Models\Ban;
use App\Models\PermanentBan;
use App\Models\TemporaryBan;
use Closure;
use Illuminate\Http\Request;

class BanPermanent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        /*   // pass request if user is not logged in */
        /*   if (!auth()->user()) return $next($request); */
        /*  */
        /*   #$bans = $request->user()->bannable->take(config('perm_ban_after_temp')); */
        /*   // hard code */
        /*   // take last 3 bans */
        /*   $bans = $request->user()->bannable->take(3); */
        /*  */
        /*  */
        /*   $temp3streak = true; */
        /*  */
        /*   # & is to pass the variable by reference */
        /*   $bans->each(function($ban) use (&$temp3streak){ */
        /*       if (!($ban instanceof TemporaryBan)) { */
        /*           $temp3streak = false; */
        /*       } */
        /*   }); */
        /*  */
        /*   if ($bans->count() <3) { */
        /*       $temp3streak = false; */
        /*   } */
        /*  */
        /* if ($temp3streak) { */
        /*     $permanentBan = new PermanentBan(); */
        /*     $permanentBan->save(); */
        /*     $ban = new Ban([ */
        /*         'bannable_id' => $permanentBan->id, */
        /*         'bannable_type' => 'App\Models\PermanentBan', */
        /*         'reason' => "You exceeded the amount of 3 temporary bans", */
        /*   ]); */
        /*     $request->user()->bans()->save($ban); */
        /* } */
        /*  */
        return $next($request);
    }
}
