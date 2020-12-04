<?php

use Illuminate\Database\Seeder;
use App\Models\V2\Locale;
use Illuminate\Support\Facades\DB;

class LocalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locales = ['az', 'ru', 'en'];

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Locale::truncate();

        foreach ($locales as $locale){
            Locale::create([
                'name' => $locale
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
