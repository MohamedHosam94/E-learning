<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for( $i=0 ; $i<10 ; $i++){
        $array = [
            'name'          => $faker->word,
            'meta_keywords' => $faker->name,
            'meta_des'      => $faker->name
        ];

        Category::create($array);
      }
    }
}
