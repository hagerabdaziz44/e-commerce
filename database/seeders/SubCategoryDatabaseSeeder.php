<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class SubCategoryDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::factory()->count(10)->create([
            'parent_id' => $this->getRandomParentId(),
        ]);

     
    }
    private function getRandomParentId()
    {
       $parent_id =  \App\Models\Category::inRandomOrder()->first();
       return $parent_id;
    }
}
