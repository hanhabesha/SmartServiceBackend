<?php

use Illuminate\Database\Seeder;

class RequestStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [[
            'statusId' => 'status01',
            'name' => 'Pending',
            'description' => 'Awaiting decision or settlement',
        ],
            [
                'statusId' => 'status02',
                'name' => 'Success',
                'description' => '',
            ],
            [
                'statusId' => 'status03',
                'name' => 'Removed',
                'description' => '',
            ]];

        DB::table('request_statuses')->insert($status);
    }
}
