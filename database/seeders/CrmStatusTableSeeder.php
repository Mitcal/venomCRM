<?php

namespace Database\Seeders;

use App\CrmStatus;
use Illuminate\Database\Seeder;

class CrmStatusTableSeeder extends Seeder
{
    public function run()
    {
        $crmStatuses = [
            [
                'id'         => 1,
                'name'       => 'Lead',
                'created_at' => '2020-11-28 22:05:06',
                'updated_at' => '2020-11-28 22:05:06',
            ],
            [
                'id'         => 2,
                'name'       => 'Customer',
                'created_at' => '2020-11-28 22:05:06',
                'updated_at' => '2020-11-28 22:05:06',
            ],
            [
                'id'         => 3,
                'name'       => 'Partner',
                'created_at' => '2020-11-28 22:05:06',
                'updated_at' => '2020-11-28 22:05:06',
            ],
        ];

        CrmStatus::insert($crmStatuses);
    }
}
