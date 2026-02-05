<?php



namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Food;

class FoodSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            // Somali / East African
            ['name_en'=>'Rice', 'name_local'=>'Bariis', 'category'=>'food', 'region'=>'Somali', 'serving_label'=>'1 cup', 'carbs_per_serving'=>45],
            ['name_en'=>'Pancake', 'name_local'=>'Canjeero', 'category'=>'food', 'region'=>'Somali', 'serving_label'=>'1 piece', 'carbs_per_serving'=>20],
            ['name_en'=>'Samosa', 'name_local'=>'Sambuusa', 'category'=>'food', 'region'=>'Somali', 'serving_label'=>'1 piece', 'carbs_per_serving'=>15],

            // Indian
            ['name_en'=>'Lentils', 'name_local'=>'Dal', 'category'=>'food', 'region'=>'Indian', 'serving_label'=>'1 cup', 'carbs_per_serving'=>35],
            ['name_en'=>'Flatbread', 'name_local'=>'Chapati', 'category'=>'food', 'region'=>'Indian', 'serving_label'=>'1 piece', 'carbs_per_serving'=>18],

            // Drinks
            ['name_en'=>'Tea', 'name_local'=>'Chai', 'category'=>'drink', 'region'=>'Indian', 'serving_label'=>'250 ml', 'carbs_per_serving'=>12],
            ['name_en'=>'Orange juice', 'name_local'=>null, 'category'=>'drink', 'region'=>'Global', 'serving_label'=>'250 ml', 'carbs_per_serving'=>26],
            ['name_en'=>'Soda', 'name_local'=>null, 'category'=>'drink', 'region'=>'Global', 'serving_label'=>'330 ml', 'carbs_per_serving'=>35],
        ];

        foreach ($items as $it) {
            Food::create($it);
        }
    }
}
