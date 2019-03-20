<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
		factory(App\User::class,4)->create()->each(function($u) {
			$u->question()->saveMany(
				factory(App\Question::class,rand(1,5))->make()
			);
		});
    }
}
