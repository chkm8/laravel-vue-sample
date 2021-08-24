<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ImageStackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // dd(storage_path(''));
        // storage_path('app/public/images'
        $files = Storage::allFiles());
        dd($files);
        // $images = Storage::disk('public')->get('/images');
        // dd($images);
    }
}
