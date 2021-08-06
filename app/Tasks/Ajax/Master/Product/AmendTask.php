<?php

namespace App\Tasks\Ajax\Master\Product;

use Waffleboss\Foundation\Task;

class AmendTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $product = wbcm_model('master.product')::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $product) {
                $product->code = $request->input('code');
                $product->name = $request->input('name');
                $product->product_type_id = $request->input('product_type_id');
                $product->product_category_id = $request->input('product_category_id');
                $product->image_id = $request->input('image_id');
                $product->unit_id = $request->input('unit_id');
                $product->second_unit_id = $request->input('second_unit_id');
                $product->second_ratio = $request->input('second_ratio');
                $product->third_unit_id = $request->input('third_unit_id');
                $product->third_ratio = $request->input('third_ratio');
                $product->fourth_unit_id = $request->input('fourth_unit_id');
                $product->fourth_ratio = $request->input('fourth_ratio');
                $product->fifth_unit_id = $request->input('fifth_unit_id');
                $product->fifth_ratio = $request->input('fifth_ratio');
                $product->inventory_account_id = $request->boolean('monitor_stock')
                    ?   $request->input('inventory_account_id')
                    :   null;
                $product->purchase_account_id = $request->boolean('purchase')
                    ?   $request->input('purchase_account_id')
                    :   null;
                $product->purchase_return_account_id = $request->boolean('purchase')
                    ?   $request->input('purchase_return_account_id')
                    :   null;
                $product->sales_account_id = $request->boolean('sales')
                    ?   $request->input('sales_account_id')
                    :   null;
                $product->sales_return_account_id = $request->boolean('sales')
                    ?   $request->input('sales_return_account_id')
                    :   null;
                $product->usage_account_id = $request->boolean('monitor_stock')
                    ?   $request->input('usage_account_id')
                    :   null;
                $product->inventory_adjustment_income_account_id = $request->boolean('monitor_stock')
                    ?   $request->input('inventory_adjustment_income_account_id')
                    :   null;
                $product->inventory_adjustment_expense_account_id = $request->boolean('monitor_stock')
                    ?   $request->input('inventory_adjustment_expense_account_id')
                    :   null;
                $product->active = true;
                $product->monitor_stock = $request->boolean('monitor_stock');
                $product->all_branch_types = $request->boolean('all_branch_types');
                $product->all_branches = $request->boolean('all_branches');
                $product->all_purchase = $request->boolean('all_purchase');
                $product->all_sales = $request->boolean('all_sales');
                $product->all_incoming_mutation = $request->boolean('all_incoming_mutation');
                $product->all_outgoing_mutation = $request->boolean('all_outgoing_mutation');
                $product->description = $request->input('description');
                $product->note = $request->input('note');
                $product->save();

                // Sync branch type.
                $data = [];
                foreach ($request->input('branch_type_product') as $branchTypeProduct) {
                    $data[$branchTypeProduct['branch_type_id']] = [
                        'purchase' => $product->all_purchase
                            ?   true
                            :   $branchTypeProduct['purchase'],
                        'sales' => $product->all_sales
                            ?   true
                            :   $branchTypeProduct['sales'],
                        'incoming_mutation' => $product->all_incoming_mutation
                            ?   true
                            :   $branchTypeProduct['incoming_mutation'],
                        'outgoing_mutation' => $product->all_outgoing_mutation
                            ?   true
                            :   $branchTypeProduct['outgoing_mutation'],
                    ];
                }
                $product->branchTypes()->sync($data);

                // Sync branch.
                $data = [];
                foreach ($request->input('branch_product') as $branchProduct) {
                    $data[$branchProduct['branch_id']] = [
                        'purchase' => $product->all_purchase
                            ?   true
                            :   $branchProduct['purchase'],
                        'sales' => $product->all_sales
                            ?   true
                            :   $branchProduct['sales'],
                        'incoming_mutation' => $product->all_incoming_mutation
                            ?   true
                            :   $branchProduct['incoming_mutation'],
                        'outgoing_mutation' => $product->all_outgoing_mutation
                            ?   true
                            :   $branchProduct['outgoing_mutation'],
                    ];
                }
                $product->branches()->sync($data);
            }
        );

        return $product;
    }
}
