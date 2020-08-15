<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = new DateTime(null,new DateTimeZone('Asia/Jakarta'));
        $list_category = ['Beginer','Medium','Advance'];
        foreach($list_category as $category){
            $db_category = new Category;
            $db_category->category_id = uniqid();
            $db_category->category_title = $category;
            $db_category->category_image = '/assets/img/deluxe.jpg';
            $db_category->created_at = $time->format('Y-m-d H:i:s');
            $db_category->save();
        }
    }
}
