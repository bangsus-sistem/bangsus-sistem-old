<?php

namespace Database\Seeders\Data;

use Waffleboss\Foundation\Database\ResourceSeeder;

class AttendanceTypeSeeder extends ResourceSeeder
{
    /**
     * @var string
     */
    protected $dataSource = 'attendance-type.json';

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('attendance_types')->insert($this->parseData($this->data));
    }

    /**
     * Parse the attendance type data.
     * 
     * @param  array  $data
     * @return array
     */
    private function parseData(array $data)
    {
        $return = [];

        foreach ($data as $attendanceType) {
            $attendanceType['active'] = true;
            $attendanceType['description'] = '';
            $attendanceType['note'] = '';
            $attendanceType['user_create_id'] = 1;
            $attendanceType['created_at'] = now();

            $return[] = $attendanceType;
        }

        return $return;
    }
}
