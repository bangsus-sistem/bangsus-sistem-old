<?php

namespace Database\Seeders\Data;

use Waffleboss\Foundation\Database\ResourceSeeder;

class EmployeePhotoTypeSeeder extends ResourceSeeder
{
    /**
     * @var string
     */
    protected $dataSource = 'employee-photo-type.json';

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('employee_photo_types')->insert($this->parseData($this->data));
    }

    /**
     * Parse the unit data.
     * 
     * @param  array  $data
     * @return array
     */
    private function parseData(array $data)
    {
        $return = [];

        foreach ($data as $employeehPhotoType) {
            $employeehPhotoType['active'] = true;
            $employeehPhotoType['description'] = '';
            $employeehPhotoType['note'] = '';
            $employeehPhotoType['user_create_id'] = 1;
            $employeehPhotoType['created_at'] = now();

            $return[] = $employeehPhotoType;
        }

        return $return;
    }
}
