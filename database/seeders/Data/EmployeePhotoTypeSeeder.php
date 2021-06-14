<?php

namespace Database\Seeders\Data;

use Illuminate\Database\Seeder;

class EmployeePhotoTypeSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('employee_photo_types')->insert(
            $this->parseData([
                [
                    'id' => 1,
                    'code' => 'KTP',
                    'name' => 'Foto KTP',
                    'required' => true,
                ],
                [
                    'id' => 2,
                    'code' => 'FBD',
                    'name' => 'Foto Full Body',
                    'required' => true,
                ],
                [
                    'id' => 3,
                    'code' => 'FCU',
                    'name' => 'Foto Close Up',
                    'required' => true,
                ],
            ])
        );
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
