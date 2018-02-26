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
          $skills=App\Skill::pluck('id')->toArray();
    $user=App\User::pluck('id')->toArray();

            DB::table('skill_user')->insert([
                'user_id'=>array_rand($user,1),
                'skill_id'=>array_rand($skills,1)
            ]);

           DB::table('categories')->insert([
            'name' => 'Wedding',
            'slug' => 'Wedding'
        ]);
           DB::table('categories')->insert([
            'name' => 'Portrait',
            'slug' => 'Portrait'
        ]);
         DB::table('categories')->insert([
            'name' => 'Landscape',
            'slug' => 'Landscape'
        ]);
         DB::table('categories')->insert([
            'name' => 'Corporate Event',
            'slug' => 'Corporate-Event'
        ]);
         DB::table('categories')->insert([
            'name' => 'Fashion',
            'slug' => 'Fashion'
        ]);

         DB::table('categories')->insert([
            'name' => 'Product',
            'slug' => 'Product'
        ]);
         DB::table('categories')->insert([
            'name' => 'Architecture',
            'slug' => 'Architecture'
        ]);
         DB::table('categories')->insert([
            'name' => 'Nature',
            'slug' => 'Nature'
        ]);
          DB::table('categories')->insert([
            'name' => 'Birthday',
            'slug' => 'Birthday'
        ]);
          DB::table('categories')->insert([
            'name' => 'Sports',
            'slug' => 'Sports'
        ]);

            DB::table('categories')->insert([
            'name' => 'Macro',
            'slug' => 'Macro'

        ]);
              DB::table('categories')->insert([
            'name' => 'Baby',
            'slug' => 'Baby'

        ]);
                DB::table('categories')->insert([
            'name' => 'Food',
            'slug' => 'Food'

        ]);
                  DB::table('categories')->insert([
            'name' => 'Erotic',
            'slug' => 'Erotic'

        ]);
        DB::table('categories')->insert([
            'name' => 'Wildlife',
            'slug' => 'Wildlife'

        ]);
       DB::table('categories')->insert([
            'name' => 'Documentary',
            'slug' => 'Documentary'

        ]);




        
           
        
        
    }
}
