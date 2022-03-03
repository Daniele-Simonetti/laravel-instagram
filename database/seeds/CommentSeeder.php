<?php

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use App\User;
use App\Photo;
use App\Comment;
class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
        public function run(Faker $faker)
    {
        for ($i=0; $i < 30; $i++) {
            $newComment = new Comment();
            
            $newComment->user_id = User::inRandomOrder()->first()->id;
            $newComment->photo_id = Photo::inRandomOrder()->first()->id;
            $newComment->content = $faker->sentence(6, true);
            
            $newComment->save();
        }
    }
}
