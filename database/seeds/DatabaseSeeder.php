<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\Course::class, 10)->create();
        factory(App\Batch::class, 10)->create();
        factory(App\Faculty::class, 10)->create()->each(function($faculty){
            factory(App\Student::class, 10)->create()->each(function($student){
                factory(App\Fee::class,10)->create();
            });
        });
    }
}
