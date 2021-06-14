<?php

namespace Database\Seeders\Data;

use Illuminate\Database\Seeder;

class JobTitleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('job_titles')->insert(
            $this->parseData([
                [
                    'id' => 1,
                    'code' => 'SPV',
                    'name' => 'Supervisor',
                    'division_code' => 'OP'
                ],
                [
                    'id' => 2,
                    'code' => 'LDR',
                    'name' => 'Leader',
                    'division_code' => 'OP'
                ],
                [
                    'id' => 3,
                    'code' => 'CRW',
                    'name' => 'Crew',
                    'division_code' => 'OP'
                ],
                [
                    'id' => 4,
                    'code' => 'TRN',
                    'name' => 'Trainee',
                    'division_code' => 'OP'
                ],
                [
                    'id' => 5,
                    'code' => 'SAC',
                    'name' => 'Staff Akunting',
                    'division_code' => 'AC'
                ],
                [
                    'id' => 6,
                    'code' => 'SIT',
                    'name' => 'Staff IT',
                    'division_code' => 'IT'
                ],
                [
                    'id' => 7,
                    'code' => 'AFN',
                    'name' => 'Admin Finance',
                    'division_code' => 'FN'
                ],
            ])
        );
    }

    /**
     * Parse the job title data.
     * 
     * @param  array  $data
     * @return array
     */
    private function parseData(array $data)
    {
        $return = [];
        $divisions = \DB::table('divisions')->get();

        foreach ($data as $jobTitle) {
            $division = $divisions->where('code', $jobTitle['division_code'])
                ->first();
            $return[] = [
                'id' => $jobTitle['id'],
                'code' => $jobTitle['code'],
                'name' => $jobTitle['name'],
                'division_id' => $division->id,
                'active' => true,
                'description' => '',
                'note' => '',
                'user_create_id' => 1,
                'created_at' => now(),
            ];
        }

        return $return;
    }
}
