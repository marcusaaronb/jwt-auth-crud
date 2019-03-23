<?php

use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->truncate();
        $json = storage_path() . "/json_data/course.json";
        $data = json_decode(file_get_contents($json, true));
        foreach ($data as $obj) {
            App\Course::create([
                'name' => $obj->name,
                'is_active' => $obj->is_active,
            ]);
        }
    }
}
