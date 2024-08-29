<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate the plans table
        Image::truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $images = Image::query()->insert([
           [
               'id' => 1,
               'name' => 'osh',
               'image_url' => 'meal_images/osh.png',
               'taomlar_id' => 1
           ],
            [
                'id' => 2,
                'name' => 'shorva',
                'image_url' => 'meal_images/shorva.png',
                'taomlar_id' => 2
            ],
            [
                'id' => 3,
                'name' => 'mastava',
                'image_url' => 'meal_images/mastav.png',
                'taomlar_id' => 3
            ],
            [
                'id' => 4,
                'name' => 'shavla',
                'image_url' => 'meal_images/shavla.png',
                'taomlar_id' => 4
            ],
            [
                'id' => 5,
                'name' => 'suyuq makaron',
                'image_url' => 'meal_images/makaron_suyuq.png',
                'taomlar_id' => 5
            ],
            [
                'id' => 6,
                'name' => 'makaron palov',
                'image_url' => 'meal_images/makaron_qoyiq.png',
                'taomlar_id' => 6
            ],
            [
                'id' => 7,
                'name' => 'mosh xorda',
                'image_url' => 'meal_images/mosh_suyuq.png',
                'taomlar_id' => 7
            ],
            [
                'id' => 8,
                'name' => 'moshkichri',
                'image_url' => 'meal_images/mosh_qoyiq.png',
                'taomlar_id' => 8
            ],
        ]);
    }
}
