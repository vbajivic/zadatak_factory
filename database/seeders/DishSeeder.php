<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Faker;
use App\Models\Dish;
use App\Models\Ingredient;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Language;
use App\Models\DishIngredient;
use App\Models\DishTag;

class DishSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        foreach (['hrv', 'en', 'fr', 'de'] as $lang) {
            $language = new Language();
            $language->lang = $lang;
            $language->save();
        }
        $faker = Faker\Factory::create();
        $languages = Language::all();
        
        for ($i = 1; $i < 11; $i++) {
            $category = new Category();
            $category->slug = "Cat-" . $i;
            foreach ($languages as $language) {
                $locale = $language->lang;
                $category->translateOrNew($locale)->title = $faker->word . " " . $locale;
            }
            $category->save();
        }
        
        for ($i = 1; $i < 11; $i++) {
            $dish = new Dish();
            $dish->status = "Created";
            $dish->category_id = rand(1, 10);
            foreach ($languages as $language) {
                $locale = $language->lang;
                $dish->translateOrNew($locale)->title = $faker->word . " " . $locale;
                $dish->translateOrNew($locale)->description = $faker->sentence . " " . $locale;
            }
            $dish->save();
        }
        
        for ($i = 1; $i < 11; $i++) {
            $tag = new Tag();
            $tag->slug = "Tag-" . $i;
            foreach ($languages as $language) {
                $locale = $language->lang;
                $tag->translateOrNew($locale)->title = $faker->word . " " . $locale;
            }
            $tag->save();
        }
        
        for ($i = 1; $i < 11; $i++) {
            $ingredient = new Ingredient();
            $ingredient->slug = "Tag-" . $i;
            foreach ($languages as $language) {
                $locale = $language->lang;
                $ingredient->translateOrNew($locale)->title = $faker->word . " " . $locale;
            }
            $ingredient->save();
        }
        
        for ($i = 1; $i < 11; $i++) {
            DB::table('dish_tag')->insert([
                'dish_id' => $i,
                'tag_id' => rand(1,10)
            ]);
        }
        for ($i = 1; $i < 11; $i++) {
            DB::table('dish_ingredient')->insert([
                'dish_id' => $i,
                'ingredient_id' => rand(1,10)
            ]);
        }

    }

}
