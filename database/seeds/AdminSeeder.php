<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user  = new User;
        $user->username = "admin";
        $user->password = bcrypt("admin");
        $user->level = "ADMIN";
        $user->datetime_created = now();
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();
    }
}
