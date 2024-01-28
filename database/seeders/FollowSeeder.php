<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FollowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $master = User::find(1);
        $otherUsers = User::whereKeyNot($master)->get();

        $master->follow($otherUsers);

        $otherUsers->each(fn($otherUser) => $otherUser->follow($master));
    }
}
