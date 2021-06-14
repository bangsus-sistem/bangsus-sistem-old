<?php

namespace Database\Seeders\Data;

use Illuminate\Database\Seeder;

class AttendanceTypeSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('attendance_types')->insert(
            $this->parseData([
                [
                    'id' => 1,
                    'code' => 'RG',
                    'name' => 'Reguler',
                ],
            ])
        );
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
