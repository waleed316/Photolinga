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
           DB::table('skills')->insert([
            'name' => 'Wedding Photography'
        ]);
            DB::table('skills')->insert([
            'name' => 'Album Making'
        ]);
             DB::table('skills')->insert([
            'name' => 'Videography'
        ]);
              DB::table('skills')->insert([
            'name' => 'Still Shoots'
        ]);
               DB::table('skills')->insert([
            'name' => 'Cinematography'
        ]);
        
        
    }
}
