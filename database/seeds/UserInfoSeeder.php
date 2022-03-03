<?php

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use App\User;
use App\UserInfo;

class UserInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();
        foreach ($users as $user) {
            $newUserInfo = new UserInfo();
            $newUserInfo->user_id = $user->id;
            $newUserInfo->firstname = $faker->firstName();
            $newUserInfo->lastname = $faker->lastName();
            $newUserInfo->phone = $faker->phoneNumber();
            $newUserInfo->save();
        }
    }
}
