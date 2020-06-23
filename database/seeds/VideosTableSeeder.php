<?php

use App\Models\Video;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
      $faker = Faker::create();

       $youtube = [
         'https://www.youtube.com/watch?v=RK1K2bCg4J8',
         'https://www.youtube.com/watch?v=C0DPdy98e4c',
         'https://www.youtube.com/watch?v=MB80ZuIJATI'
       ];

       $images = [
         '15867026712bcDIJ1NxB.png',
         '112312121.png'
       ];

       $ids = [1,2,3,4,5,6,7,8,9];

      for( $i=0 ; $i<10 ; $i++){
      $array = [
          'user_id'       => 1,
          'name'          => $faker->word,
          'meta_keywords' => $faker->name,
          'meta_des'      => $faker->name,
          'cat_id'        => 1,
          'youtube'       => $youtube[rand(0,2)],
          'published'     => rand(0,1),
          'image'         => $images[rand(0,1)],
          'des'           =>  $faker->paragraph 
      ];

      $video = Video::create($array);
      $video->skills()->sync(array_rand($ids , 2));
      $video->tags()->sync(array_rand($ids , 3));
    }

    }
}
