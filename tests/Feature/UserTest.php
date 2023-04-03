<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Ban;
use App\Models\TemporaryBan;
use App\Models\PermanentBan;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
public function it_checks_if_user_has_a_permanent_ban()
{
    $user = User::factory()->create();

    $perm = new PermanentBan;
    $perm->save();

    $ban = new Ban;
    $ban->user_id = $user->id;
    $ban->reason = 'testing permanent ban';
    $ban->bannable()->associate($perm);
    $user->bans()->save($ban);

    // returns false idk why FIX
    $this->assertTrue($user->isBanned());

    // clear bans for next test case
    $user->bans()->delete();
    $user->delete();
}
//Test case 2: user has a temporary ban that has not yet expired

/** @test */
public function it_checks_if_user_has_a_temporary_ban_that_has_not_yet_expired()
{
    $user = User::factory()->create();

    // Test case 2: user has a temporary ban that has not yet expired
    $temporaryBan = new TemporaryBan;
    $temporaryBan->until = now()->addDays(1);
    $temporaryBan->save();

    $ban = new Ban;
    $ban->reason = 'testing temp ban';
    $ban->bannable()->associate($temporaryBan);
    $user->bans()->save($ban);

    $this->assertTrue($user->isBanned());
    $user->bans()->delete();
    $user->delete();

}
//Test case 3: user has a temporary ban that has already expired

/** @test */
public function it_checks_if_user_has_a_temporary_ban_that_has_already_expired()
{
    $user = User::factory()->create();

    // Test case 3: user has a temporary ban that has already expired
    $temporaryBan = new TemporaryBan;
    $temporaryBan->until = now()->subDay();
    $temporaryBan->save();

    $ban = new Ban;
    $ban->reason = 'testing temp ban';
    $ban->bannable()->associate($temporaryBan);
    $user->bans()->save($ban);

    $this->assertFalse($user->isBanned());
    $user->bans()->delete();
    $user->delete();
}
//Test case 4: user has 3 temporary bans

/** @test */
public function it_checks_if_user_has_3_temporary_bans(){
    $user = User::factory()->create();

    $temporaryBan1 = TemporaryBan::create([
        'until' => now()->subDay(1),
    ]);

    $temporaryBan2 = TemporaryBan::create([
        'until' => now(),
    ]);

    $temporaryBan3 = TemporaryBan::create([
        'until' => now()->addDay(1),
    ]);

    $ban1 = new Ban;
    $ban1->user_id = $user->id;
    $ban1->reason = 'testing temp ban 1';
    $ban1->bannable()->associate($temporaryBan1);
    $user->bans()->save($ban1);

    $ban2 = new Ban;
    $ban2->user_id = $user->id;
    $ban2->reason = 'testing temp ban 2';
    $ban2->bannable()->associate($temporaryBan2);
    $user->bans()->save($ban2);

    $ban3 = new Ban;
    $ban3->user_id = $user->id;
    $ban3->reason = 'testing temp ban 3';
    $ban3->bannable()->associate($temporaryBan1);
    $user->bans()->save($ban3);

    $this->assertTrue($user->isBanned());
}
}
