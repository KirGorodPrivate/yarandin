<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Project');


        for($i = 0; $i <= 25; $i++){
            DB::table('tasks')->insert([
                'title' => $faker->sentence,
                'description' => $faker->paragraph(5),
                'project_id' => $faker->numberBetween(1, 10),
                'status' => $faker->randomElement($array = array ('New','In progress','Done')),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
