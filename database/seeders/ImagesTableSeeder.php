<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            [
                'theme_name' => 'Childcare',
                'image_path' => 'img/themes/childcare.png',
                'image_name' => 'childcare.png',
                'thumb_name' => 'chil_thumb.png',
                'thumb_path' => 'img/thumb/chil_thumb.png',
                'status' => '1',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'theme_name' => 'Dentist',
                'image_path' => 'img/themes/dentiest.png',
                'image_name' => 'dentiest.png',
                'thumb_name' => 'dental_thumb.png',
                'thumb_path' => 'img/thumb/dental_thumb.png',
                'status' => '1',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'theme_name' => 'Eyecare',
                'image_path' => 'img/themes/eyecare.png',
                'image_name' => 'eyecare.png',
                'thumb_name' => 'eye_thumb.png',
                'thumb_path' => 'img/thumb/eye_thumb.png',
                'status' => '1',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'theme_name' => 'Physiotherapist',
                'image_path' => 'img/themes/physiotherapist.png',
                'image_name' => 'physiotherapist.png',
                'thumb_name' => 'physiotherapist_thumb.png',
                'thumb_path' => 'img/thumb/physiotherapist_thumb.png',
                'status' => '1',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'theme_name' => 'Cardiologist',
                'image_path' => 'img/themes/cardio.png',
                'image_name' => 'cardio.png',
                'thumb_name' => 'cardiothumb.jpg',
                'thumb_path' => 'img/thumb/cardiothumb.jpg',
                'status' => '1',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'theme_name' => 'Pediatricianst',
                'image_path' => 'img/themes/pedia.jpg',
                'image_name' => 'pedia.jpg',
                'thumb_name' => 'pediathumb.jpg',
                'thumb_path' => 'img/thumb/pediathumb.jpg',
                'status' => '1',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'theme_name' => 'Chiropractor',
                'image_path' => 'img/themes/chiropractor.png',
                'image_name' => 'chiropractor.png',
                'thumb_name' => 'chiropractorthumb.png',
                'thumb_path' => 'img/thumb/chiropractorthumb.png',
                'status' => '1',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'theme_name' => 'Maternity',
                'image_path' => 'img/themes/maternity.png',
                'image_name' => 'Maternity.jpg',
                'thumb_name' => 'Maternity.png',
                'thumb_path' => 'img/thumb/maternity.png',
                'status' => '1',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'theme_name' => 'Ent',
                'image_path' => 'img/themes/ent.png',
                'image_name' => 'ent.jpg',
                'thumb_name' => 'ent.png',
                'thumb_path' => 'img/thumb/ent.png',
                'status' => '1',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'theme_name' => 'Psychiatrist',
                'image_path' => 'img/themes/mental.png',
                'image_name' => 'psychiatrist.jpg',
                'thumb_name' => 'mental.png',
                'thumb_path' => 'img/thumb/mental.png',
                'status' => '1',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'theme_name' => 'Massage',
                'image_path' => 'img/themes/massage.png',
                'image_name' => 'massage.jpg',
                'thumb_name' => 'massage.png',
                'thumb_path' => 'img/thumb/massage.png',
                'status' => '1',
                'created_at' => null,
                'updated_at' => null,
            ],
            // Add more data as needed
        ];
    
        // Insert the data
        DB::table('images')->insert($images);
    }
}
