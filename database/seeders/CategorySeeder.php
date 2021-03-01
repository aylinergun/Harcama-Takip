<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $categorySeed = [
          [  'category_name'=>' Vergi'],
          [  'category_name'=>'Banka'],
          [  'category_name'=>'Fatura'],
          [  'category_name'=>'Alışveriş'],
          [  'category_name'=>'Faiz'],
        ];

        Category::create($categories);

        foreach ($categorySeed as $seed) {
          Category::create($seed);
        }
      }
    }
