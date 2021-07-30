<?php

namespace Database\Seeders\Injections;

use Illuminate\Database\Seeder;

class ProfitLossAccountGroupSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('profit_loss_account_groups')->insert([
            ['id' => 1, 'ref' => 'sales', 'name' => 'Penjualan'],
            ['id' => 2, 'ref' => 'cost_of_goods_sold', 'name' => 'Harga Pokok Penjualan'],
            ['id' => 3, 'ref' => 'expense', 'name' => 'Beban'],
            ['id' => 4, 'ref' => 'other_income', 'name' => 'Pendapatan Lain-Lain'],
            ['id' => 5, 'ref' => 'other_expense', 'name' => 'Beban Lain-Lain'],
            ['id' => 6, 'ref' => 'profit_loss', 'name' => 'Laba / Rugi (sudah diposting)'],
        ]);
    }
}
