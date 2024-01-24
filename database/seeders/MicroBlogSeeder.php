<?php

namespace Database\Seeders;

use App\Models\MicroBlog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class MicroBlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MicroBlog::factory(1000)
            ->sequence(fn() => ['user_id' => Arr::random(range(1, 10))])
            ->create();
    }
}
