<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'Xbox',
                'slug' => 'xbox',
                'created_at' => '2020-04-17 14:16:19',
                'updated_at' => '2020-04-18 13:36:02',
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => NULL,
                'order' => 2,
                'name' => 'PlayStation',
                'slug' => 'playstation',
                'created_at' => '2020-04-17 14:16:19',
                'updated_at' => '2020-04-18 13:36:31',
            ),
            2 => 
            array (
                'id' => 3,
                'parent_id' => NULL,
                'order' => 3,
                'name' => 'PC',
                'slug' => 'pc',
                'created_at' => '2020-04-18 13:36:47',
                'updated_at' => '2020-04-18 13:36:47',
            ),
            3 => 
            array (
                'id' => 4,
                'parent_id' => NULL,
                'order' => 4,
                'name' => 'Nintendo',
                'slug' => 'nintendo',
                'created_at' => '2020-04-18 13:37:05',
                'updated_at' => '2020-04-18 13:37:05',
            ),
            4 => 
            array (
                'id' => 5,
                'parent_id' => NULL,
                'order' => 5,
                'name' => 'Tech',
                'slug' => 'tech',
                'created_at' => '2020-04-18 13:37:35',
                'updated_at' => '2020-04-18 13:37:35',
            ),
        ));
        
        
    }
}