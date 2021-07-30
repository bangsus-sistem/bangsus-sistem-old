<?php

namespace Database\Seeders\Injections;

use Illuminate\Database\Seeder;

class AccountTypeSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('account_types')->insert(
            $this->parseData([
                [
                    'ref' => 'cash_bank',
                    'name' => 'Kas / Bank',
                    'default_reverse_value' => 0,
                    'trial_balance_account_group_id' => 1,
                    'profit_loss_account_group_id' => null,
                ],
                [
                    'ref' => 'inventory',
                    'name' => 'Persediaan',
                    'default_reverse_value' => 0,
                    'trial_balance_account_group_id' => 1,
                    'profit_loss_account_group_id' => null,
                ],
                [
                    'ref' => 'account_receivable',
                    'name' => 'Piutang Usaha',
                    'default_reverse_value' => 0,
                    'trial_balance_account_group_id' => 1,
                    'profit_loss_account_group_id' => null,
                ],
                [
                    'ref' => 'unbilled_receivable',
                    'name' => 'Piutang Belum Ditagih',
                    'default_reverse_value' => 0,
                    'trial_balance_account_group_id' => 1,
                    'profit_loss_account_group_id' => null,
                ],
                [
                    'ref' => 'purchase_return_receivable',
                    'name' => 'Piutang Retur Pembelian',
                    'default_reverse_value' => 0,
                    'trial_balance_account_group_id' => 1,
                    'profit_loss_account_group_id' => null,
                ],
                [
                    'ref' => 'cash_purchase_receivable',
                    'name' => 'Piutang Kasbon Pembelian',
                    'default_reverse_value' => 0,
                    'trial_balance_account_group_id' => 1,
                    'profit_loss_account_group_id' => null,
                ],
                [
                    'ref' => 'other_receivable',
                    'name' => 'Piutang Lain-Lain',
                    'default_reverse_value' => 0,
                    'trial_balance_account_group_id' => 1,
                    'profit_loss_account_group_id' => null,
                ],
                [
                    'ref' => 'paid_purchase',
                    'name' => 'Uang Muka Pembelian',
                    'default_reverse_value' => 0,
                    'trial_balance_account_group_id' => 1,
                    'profit_loss_account_group_id' => null,
                ],
                [
                    'ref' => 'paid_expense',
                    'name' => 'Biaya Dibayar Dimuka',
                    'default_reverse_value' => 0,
                    'trial_balance_account_group_id' => 1,
                    'profit_loss_account_group_id' => null,
                ],
                [
                    'ref' => 'other_current_asset',
                    'name' => 'Aset Lancar Lain-Lain',
                    'default_reverse_value' => 0,
                    'trial_balance_account_group_id' => 1,
                    'profit_loss_account_group_id' => null,
                ],
                // Fixed Assets
                [
                    'ref' => 'fixed_asset',
                    'name' => 'Aset Tetap',
                    'default_reverse_value' => 0,
                    'trial_balance_account_group_id' => 1,
                    'profit_loss_account_group_id' => null,
                ],
                [
                    'ref' => 'depreciation_accumulation',
                    'name' => 'Akumulasi Penyusutan Aset Tetap',
                    'default_reverse_value' => 0,
                    'trial_balance_account_group_id' => 1,
                    'profit_loss_account_group_id' => null,
                ],
                [
                    'ref' => 'other_fixed_asset',
                    'name' => 'Aset Tetap Lain-Lain',
                    'default_reverse_value' => 0,
                    'trial_balance_account_group_id' => 1,
                    'profit_loss_account_group_id' => null,
                ],
                // Other Assets
                [
                    'ref' => 'other_asset',
                    'name' => 'Aset Lain-Lain',
                    'default_reverse_value' => 0,
                    'trial_balance_account_group_id' => 1,
                    'profit_loss_account_group_id' => null,
                ],
    
                // Current Liabilities
                [
                    'ref' => 'account_payable',
                    'name' => 'Hutang Usaha',
                    'default_reverse_value' => 1,
                    'trial_balance_account_group_id' => 2,
                    'profit_loss_account_group_id' => null,
                ],
                [
                    'ref' => 'unbilled_payable',
                    'name' => 'Hutang Belum Ditagih',
                    'default_reverse_value' => 1,
                    'trial_balance_account_group_id' => 2,
                    'profit_loss_account_group_id' => null,
                ],
                [
                    'ref' => 'sales_return_payable',
                    'name' => 'Hutang Retur Penjualan',
                    'default_reverse_value' => 1,
                    'trial_balance_account_group_id' => 2,
                    'profit_loss_account_group_id' => null,
                ],
                [
                    'ref' => 'reimbursement_payable',
                    'name' => 'Hutang Reimbursement',
                    'default_reverse_value' => 1,
                    'trial_balance_account_group_id' => 2,
                    'profit_loss_account_group_id' => null,
                ],
                [
                    'ref' => 'other_payable',
                    'name' => 'Hutang Lain-Lain',
                    'default_reverse_value' => 1,
                    'trial_balance_account_group_id' => 2,
                    'profit_loss_account_group_id' => null,
                ],
                [
                    'ref' => 'paid_sales',
                    'name' => 'Uang Muka Penjualan',
                    'default_reverse_value' => 1,
                    'trial_balance_account_group_id' => 2,
                    'profit_loss_account_group_id' => null,
                ],
                [
                    'ref' => 'accrued_expense',
                    'name' => 'Biaya Masih Harus Dibayar',
                    'default_reverse_value' => 1,
                    'trial_balance_account_group_id' => 2,
                    'profit_loss_account_group_id' => null,
                ],
                [
                    'ref' => 'other_current_liability',
                    'name' => 'Liabilitas Jangka Pendek Lain-Lain',
                    'default_reverse_value' => 1,
                    'trial_balance_account_group_id' => 2,
                    'profit_loss_account_group_id' => null,
                ],
                // Long Term Liabilities
                [
                    'ref' => 'long_term_liability',
                    'name' => 'Liabilitas Jangka Panjang',
                    'default_reverse_value' => 1,
                    'trial_balance_account_group_id' => 2,
                    'profit_loss_account_group_id' => null,
                ],
                // Other Liabilities
                [
                    'ref' => 'other_liability',
                    'name' => 'Liabilitias Lain-Lain',
                    'default_reverse_value' => 1,
                    'trial_balance_account_group_id' => 2,
                    'profit_loss_account_group_id' => null,
                ],
    
                // Equity
                [
                    'ref' => 'capital',
                    'name' => 'Modal',
                    'default_reverse_value' => 1,
                    'trial_balance_account_group_id' => 2,
                    'profit_loss_account_group_id' => null,
                ],
                [
                    'ref' => 'prive',
                    'name' => 'Prive',
                    'default_reverse_value' => 1,
                    'trial_balance_account_group_id' => 2,
                    'profit_loss_account_group_id' => null,
                ],
                [
                    'ref' => 'profit_loss',
                    'name' => 'Laba / Rugi Berjalan',
                    'default_reverse_value' => 1,
                    'trial_balance_account_group_id' => 2,
                    'profit_loss_account_group_id' => 6,
                ],
                [
                    'ref' => 'retained_profit_loss',
                    'name' => 'Laba / Rugi Ditahan',
                    'default_reverse_value' => 1,
                    'trial_balance_account_group_id' => 2,
                    'profit_loss_account_group_id' => null,
                ],
                [
                    'ref' => 'opening_balance_equity',
                    'name' => 'Saldo Awal Ekuitas',
                    'default_reverse_value' => 1,
                    'trial_balance_account_group_id' => 2,
                    'profit_loss_account_group_id' => null,
                ],
                [
                    'ref' => 'opening_balance_account',
                    'name' => 'Ekuitas Saldo Awal Akun',
                    'default_reverse_value' => 1,
                    'trial_balance_account_group_id' => 2,
                    'profit_loss_account_group_id' => null,
                ],
                [
                    'ref' => 'other_equity',
                    'name' => 'Ekuitas Lain-Lain',
                    'default_reverse_value' => 1,
                    'trial_balance_account_group_id' => 2,
                    'profit_loss_account_group_id' => null,
                ],
    
                // Sales
                [
                    'ref' => 'sales',
                    'name' => 'Penjualan',
                    'default_reverse_value' => 1,
                    'trial_balance_account_group_id' => null,
                    'profit_loss_account_group_id' => 1,
                ],
                [
                    'ref' => 'sales_return',
                    'name' => 'Retur Penjualan',
                    'default_reverse_value' => 0,
                    'trial_balance_account_group_id' => null,
                    'profit_loss_account_group_id' => 1,
                ],
                [
                    'ref' => 'other_sales',
                    'name' => 'Penjualan Lain-Lain',
                    'default_reverse_value' => 1,
                    'trial_balance_account_group_id' => null,
                    'profit_loss_account_group_id' => 1,
                ],
    
                // Usage / Purchase
                [
                    'ref' => 'cost_of_goods_sold',
                    'name' => 'Harga Pokok Persediaan',
                    'default_reverse_value' => 0,
                    'trial_balance_account_group_id' => null,
                    'profit_loss_account_group_id' => 2,
                ],
                [
                    'ref' => 'cost_of_purchase',
                    'name' => 'Harga Pokok Pembelian',
                    'default_reverse_value' => 0,
                    'trial_balance_account_group_id' => null,
                    'profit_loss_account_group_id' => 2,
                ],
                [
                    'ref' => 'purchase_return',
                    'name' => 'Retur Pembelian',
                    'default_reverse_value' => 1,
                    'trial_balance_account_group_id' => null,
                    'profit_loss_account_group_id' => 2,
                ],
    
                // Expense
                [
                    'ref' => 'expense_cost',
                    'name' => 'Beban Biaya',
                    'default_reverse_value' => 0,
                    'trial_balance_account_group_id' => null,
                    'profit_loss_account_group_id' => 3,
                ],
                [
                    'ref' => 'equipment_cost',
                    'name' => 'Beban Perlengkapan',
                    'default_reverse_value' => 0,
                    'trial_balance_account_group_id' => null,
                    'profit_loss_account_group_id' => 3,
                ],
                [
                    'ref' => 'depreciation_expense',
                    'name' => 'Beban Penyusutan Aset Tetap',
                    'default_reverse_value' => 0,
                    'trial_balance_account_group_id' => null,
                    'profit_loss_account_group_id' => 3,
                ],
    
                // Other Income
                [
                    'ref' => 'inventory_adjustment_income',
                    'name' => 'Pendapatan Penyesuaian Persediaan',
                    'default_reverse_value' => 1,
                    'trial_balance_account_group_id' => null,
                    'profit_loss_account_group_id' => 4,
                ],
                [
                    'ref' => 'other_income',
                    'name' => 'Pendapatan Lain-Lain',
                    'default_reverse_value' => 1,
                    'trial_balance_account_group_id' => null,
                    'profit_loss_account_group_id' => 4,
                ],
    
                // Other Expense
                [
                    'ref' => 'inventory_adjustment_expense',
                    'name' => 'Beban Penyesuaian Persediaan',
                    'default_reverse_value' => 0,
                    'trial_balance_account_group_id' => null,
                    'profit_loss_account_group_id' => 5,
                ],
                [
                    'ref' => 'other_expense',
                    'name' => 'Beban Lain-Lain',
                    'default_reverse_value' => 0,
                    'trial_balance_account_group_id' => null,
                    'profit_loss_account_group_id' => 5,
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

        foreach ($data as $accountType) {
            $accountType['id'] = null;

            $return[] = $accountType;
        }

        return $return;
    }
}
