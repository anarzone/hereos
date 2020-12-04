<?php

use App\Models\V2\Categories\Category;
use App\Models\V2\Categories\CategoryTranslation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Category::truncate();
        CategoryTranslation::truncate();

        $locales = \App\Models\V2\Locale::all();

        $categoryTranslations = [
            'az' => [
                'names' => [
                    'Məzmun marketinqi',
                    'Seo',
                    'SMM',
                    'Maraqlıdır',
                ],
                'slugs' => [
                    'mezmun-marketinqi',
                    'seo',
                    'smm',
                    'maraqlidir',
                ]
            ]
        ];

        $categories = [];
        foreach ($locales as $locale){
            $step = 1;
            if(isset($categoryTranslations[$locale->name])){
                foreach ($categoryTranslations[$locale->name]['names'] as $i => $name){
                    if($step == 1){
                        $categories[] = Category::create([
                            'slug' => $categoryTranslations[$locale->name]['slugs'][$i],
                            'position' => $i + 1
                        ]);
                    }

                    CategoryTranslation::create([
                        'name' => $name,
                        'locale_id' => $locale->id,
                        'category_id' => $categories[$i]->id
                    ]);
                }
            }
            $step++;
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
