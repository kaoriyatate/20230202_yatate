<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Todo;

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
            'id' => '1',
            'content' => '掃除',
            'user_id' => '1',
            'tag_id' => '1'
        ];
        Todo::create($param);
        $param = [
            'id' => '2',
            'content' => '散歩',
            'user_id' => '1',
            'tag_id' => '3',
        ];
        Todo::create($param);
        $param = [
            'id' => '3',
            'content' => 'プログラミング',
            'user_id' => '1',
            'tag_id' => '2',
        ];
        Todo::create($param);
        $param = [
            'id' => '4',
            'content' => '出勤',
            'user_id' => '1',
            'tag_id' => '5',
        ];
        Todo::create($param);
        $param = [
            'id' => '5',
            'content' => '外食',
            'user_id' => '1',
            'tag_id' => '4',
        ];
        Todo::create($param);

    }
}
