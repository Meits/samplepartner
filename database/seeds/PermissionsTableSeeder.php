<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('permissions')->insert(
	      [
	        [
	            'name' => 'VIEW_PARTNER'//1
	        ],
	        [
	            'name' => 'ADD_USER'//2
	        ],
	        [
	            'name' => 'EDIT_USER'//3
	        ],
	        [
	            'name' => 'DELETE_USER'//4
	        ],
	        [
	            'name' => 'ADD_ROLEUSER'//5
	        ],
	        [
	            'name' => 'EDIT_COMMENTS'//6
	        ],
	        [
	            'name' => 'DELETE_COMMENTS'//7
	        ],
	        [
	            'name' => 'ADD_COMMENTS'//8
	        ]
	      ]  
        
        );
    }
}
