<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'username' => 'test',
            'mail' => 'test@test',
            'password' => 'test1234',
            'bio' => 'テストです'
        ]);
    }
}
