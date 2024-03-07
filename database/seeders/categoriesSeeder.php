<?php

namespace Database\Seeders;

use App\Models\CategoryModel;
use Database\Factories\categoriesFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class categoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'name' => Str::random(10),

        ]);
    }
}
