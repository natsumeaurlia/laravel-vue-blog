<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SamplePostSeeder extends Seeder
{
    const DIR = 'markdown/test/*';

    /**
     * Set Example Post
     *
     * @return void
     */
    public function run()
    {
        $admin = User::factory()->create(['name' => 'admin', 'email' => 'test@example.com', 'password' => encrypt('example1234')]);
        $markdown_dir = resource_path(self::DIR);
        $files = glob($markdown_dir);
        collect($files)->each(function ($file) use ($admin) {
            $filename = Str::of($file)->basename('.md');
            Post::create([
                'user_id' => $admin->id,
                'title' => $filename,
                'content' => File::get($file),
                'published' => true
            ]);
        });
    }
}
