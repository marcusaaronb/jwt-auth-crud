<?php

use App\Model\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        $json = storage_path() . "/json_data/users.json";
        $data = json_decode(file_get_contents($json, true));
        foreach ($data as $obj) {
            App\User::create([
                "name" => $obj->name,
                "email" => $obj->email,
                "password" => $obj->password,
                "role_id" => $obj->role_id,
                "is_active" => $obj->is_active,
            ]);
        }
    }
}
