<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $caegories = ['Frontend', 'Backend','Fullstack', 'Laravel', 'Vue'];
        foreach($caegories as $category){
            $_cat = new Category();
            $_cat->name = $category;
            $_cat->slug = Str::slug($_cat->name);
            $_cat->save();
             
       }
    }
}
