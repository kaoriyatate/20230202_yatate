<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Seeder;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'id' => '4',
            'user_id' =>'1',
            'content' =>'9',
            'tag_id' => '1'
        ];
        Todo::create($param) ;


    }
}
