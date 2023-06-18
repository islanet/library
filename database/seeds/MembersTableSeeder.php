<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('members')->insert([
            [
                'member_number' => '1',
                'name' => 'Juan',
                'last_name' => 'Perez',
                'phone' => '1152454545',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'member_number' => '2',
                'name' => 'Luis',
                'last_name' => 'Perez',
                'phone' => '1152454550',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'member_number' => '3',
                'name' => 'David',
                'last_name' => 'Perez',
                'phone' => '1152454100',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'member_number' => '4',
                'name' => 'Diana',
                'last_name' => 'Lanz',
                'phone' => '1152454101',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'member_number' => '5',
                'name' => 'Luna',
                'last_name' => 'Lanz',
                'phone' => '1152454102',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
