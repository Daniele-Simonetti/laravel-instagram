<?php

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use App\User;
use App\Photo;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 30; $i++) {
            $newPhoto = new Photo();
            
            $newPhoto->user_id = User::inRandomOrder()->first()->id;
            $newPhoto->name = $faker->sentence(2, true);
            $newPhoto->url = $faker->imageUrl(640, 480, 'photo', true);
            $newPhoto->description = $faker->text(5, true);
            $newPhoto->slug = $newPhoto->createSlug($newPhoto->name);
            $newPhoto->save();
        }
    }
}
