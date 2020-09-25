<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class FollowersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meKey = 1;
        $users = User::all();
        $others = $users->except($meKey);
        $me = User::query()->find($meKey);

        $me->follow($others);
        $others->each(function($other) use ($me) {
            $other->follow($me);
        });
    }
}
