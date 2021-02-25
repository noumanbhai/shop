<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
'product_name'=>$this->faker->name(),
'product_code'=>$this->faker->numberBetween(1200,2500),
'product_quantity'=>$this->faker->numberBetween(1,500),
'discount_price'=>$this->faker->numberBetween(1000,50000),
'category_id'=>2,
'subcategory_id'=>3,
'product_size'=>"xl",
'product_color'=>"red",
'selling_price'=>$this->faker->numberBetween(50000,100000),
'product_details'=>$this->faker->address,
'video_link'=>"www.google.com",
'main_slider'=>1,       
'hot_deal'=>1,
'best_rated'=>1,
'mid_slider'=>1,
'hot_new'=>1,
'trend'=>1,
'image_one'=>$this->faker->image('public/media/product',400,300, null, false),
'image_two'=>$this->faker->image('public/media/product',400,300, null, false),
'image_three'=>$this->faker->image('public/media/product',400,300, null, false),
'status'=>1,
'brand_id'=>1,



        ];
    }
}
