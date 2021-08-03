<?php

namespace Database\Seeders\Injections;

use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('accounts')->insert(
            $this->parseData([
                [
                    'code' => '1',
                    'name' => 'Aktiva',
                    'account_type_id' => null,
                    'trial_balance_account_group_id' => 1,
                    'profit_loss_account_group_id' => null,
                    'reverse_value' => false,
                ],
                [
                    'code' => '2',
                    'name' => 'Pasiva',
                    'account_type_id' => null,
                    'trial_balance_account_group_id' => 2,
                    'profit_loss_account_group_id' => null,
                    'reverse_value' => true,
                ],
                [
                    'code' => '3',
                    'name' => 'Ekuitas',
                    'account_type_id' => null,
                    'trial_balance_account_group_id' => 2,
                    'profit_loss_account_group_id' => null,
                    'reverse_value' => true,
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

        foreach ($data as $account) {
            $account['id'] = null;
            $account['active'] = true;
            $account['locked'] = true;
            $account['transaction'] = false;
            $account['description'] = '';
            $account['note'] = '';
            $account['user_create_id'] = 1;
            $account['created_at'] = now();

            $return[] = $account;
        }

        return $return;
    }
}
