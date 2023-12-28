<?php

use Illuminate\Database\Seeder;
use Illuminate\support\facades\DB;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            //'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'name' => 'Admin'
            
        ];
        DB::table('users')->insert($data);
    }
}
