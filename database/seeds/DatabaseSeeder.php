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
        // $this->call(UserSeeder::class);
        factory(App\Group::class, 3)->create();

        factory(App\Level::class)->create(['name'=>'oro']);
        factory(App\Level::class)->create(['name'=>'plata']);
        factory(App\Level::class)->create(['name'=>'bronce']);

        factory(App\User::class, 5)->create()->each( function ($user){
            $profile = $user->profile()->save(factory(App\Profile::class)->make());

            $profile = location()->save(factory(App\Location::class)->make());

            $user = groups()->attach($this->array(rand(1,3)));

            $user = image()->save(factory(App\Image::class)->make([
                'url' => 'https://lorempixel.com/90/90/'
            ]));
        });
    }

    public function array($max){
        $values = [];
        for ($i=1; $i < $max; $i++) { 
            $values[] = $i
        }
        return $values;
    }
}
