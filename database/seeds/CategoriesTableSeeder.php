<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 10)->create()->each(function (Category $category) {
            $category->children()->saveMany(
                factory(Category::class, random_int(0, 3))->create()->each(function (Category $category) {
                    $category->children()->saveMany(
                        factory(Category::class, random_int(0, 3))->create()->each(function (Category $category) {
                            $categories = factory(Category::class, random_int(0, 3))->make();
                            $category->children()->saveMany($categories);
                        })
                    );
                })
            );
        });
    }
}
