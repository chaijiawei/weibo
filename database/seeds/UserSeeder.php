<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class)->times(100)->make()->makeVisible(['password', 'remember_token']);

        User::query()->insert($users->toArray());

        User::query()->find(1)->update([
            'name'  => 'cjw',
            'email' => 'jiawei_chai@126.com',
        ]);
    }
}
