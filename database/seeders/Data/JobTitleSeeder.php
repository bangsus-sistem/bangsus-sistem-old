<?php

namespace Database\Seeders\Data;

use Waffleboss\Foundation\Database\ResourceSeeder;

class JobTitleSeeder extends ResourceSeeder
{
    /**
     * @var string
     */
    protected $dataSource = 'job-title.json';
    
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('job_titles')->insert($this->parseData($this->data));
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
