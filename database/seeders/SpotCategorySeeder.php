<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SpotCategory;
use Illuminate\Support\Facades\File;

class SpotCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $englishFile = database_path('en_spot_category');
        $japaneseFile = database_path('ja_spot_category');

        $englishData = file($englishFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $japaneseData = file($japaneseFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if (count($englishData) !== count($japaneseData)) {
            throw new \Exception('English and Japanese files have different number of lines.');
        }

        for ($i = 0; $i < count($englishData); $i++) {
            SpotCategory::create([
                'en_name' => $englishData[$i],
                'ja_name' => $japaneseData[$i]
            ]);
        }
    }
}
