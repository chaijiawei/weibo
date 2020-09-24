<?php

use Illuminate\Database\Seeder;
use App\Models\MicroBlog;
use Illuminate\Support\Arr;

class MicroBlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $microBlogs = factory(MicroBlog::class)->times(1000)->make()->each(function($microBlog) {
            $microBlog->user_id = Arr::random(range(1, 10));
        });
        MicroBlog::query()->insert($microBlogs->toArray());
    }
}
