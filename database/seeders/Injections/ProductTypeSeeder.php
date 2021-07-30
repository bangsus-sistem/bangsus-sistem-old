<?php

namespace Database\Seeders\Injections;

use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('product_types')->insert(
            $this->parseData([
                ['id' => 1, 'ref' => 'item', 'name' => 'Barang', 'must_monitor_stock' => 1, 'can_monitor_stock' => 1],
                ['id' => 2, 'ref' => 'service', 'name' => 'Jasa', 'must_monitor_stock' => 0, 'can_monitor_stock' => 0],
                ['id' => 3, 'ref' => 'sales', 'name' => 'Penjualan', 'must_monitor_stock' => 0, 'can_monitor_stock' => 0],
                ['id' => 4, 'ref' => 'purchase', 'name' => 'Pembelian', 'must_monitor_stock' => 0, 'can_monitor_stock' => 0],
                ['id' => 5, 'ref' => 'expense', 'name' => 'Biaya', 'must_monitor_stock' => 0, 'can_monitor_stock' => 1],
                ['id' => 6, 'ref' => 'bom', 'name' => 'Menu / BOM', 'must_monitor_stock' => 0, 'can_monitor_stock' => 1],
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

        foreach ($data as $productType) {
            $return[] = $productType;
        }

        return $return;
    }
}
