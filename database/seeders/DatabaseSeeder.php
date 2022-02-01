<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Blog::truncate();
        Category::truncate();

        $frontend=Category::factory()->create(['name'=>'frontend','slug'=>'frontend']);
        $backend=Category::factory()->create(['name'=>'backend','slug'=>'backend']);

        $mgmg = User::factory()->create(['name'=>'mgmg','username'=>'mgmg']);
        $aungaung = User::factory()->create(['name'=>'aungaung','username'=>'aungaung']);
        Blog::factory(2)->create(['category_id'=>$frontend->id,'user_id'=>$mgmg->id ]);
        Blog::factory(2)->create(['category_id'=>$backend->id, 'user_id'=>$aungaung->id ]);
        Comment::factory()->create(['body'=>"This is greate artivle",'user_id'=>$mgmg->id,'blog_id'=>'$frontend->id']);
        Comment::factory()->create(['body'=>"This is bad article",'user_id'=>$aungaung->id,'blog_id'=>'$backend->id']);
    }
}
