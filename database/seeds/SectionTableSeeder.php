<?php

use Illuminate\Database\Seeder;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->truncate();
        $json = storage_path() . "/json_data/sections.json";
        $data = json_decode(file_get_contents($json, true));
        foreach ($data as $obj) {
            App\Section::create([
                'name' => $obj->name,
                'is_active' => $obj->is_active,
            ]);
        }
    }
}
