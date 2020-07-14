<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'created_at' => '2020-04-17 14:16:02',
                'updated_at' => '2020-04-17 14:16:02',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'header_menu',
                'created_at' => '2020-04-19 18:24:40',
                'updated_at' => '2020-04-19 18:24:40',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'footer_menu',
                'created_at' => '2020-04-19 19:07:12',
                'updated_at' => '2020-04-19 19:07:12',
            ),
        ));
        
        
    }
}