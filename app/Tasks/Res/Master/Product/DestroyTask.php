<?php

namespace App\Tasks\Res\Master\Product;

use Waffleboss\Foundation\Task;

class DestroyTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function handle($request)
    {
        $product = wbcm_model('master.product')::findOrFail(
            $request->input('id')
        );
        $this->transaction(
            fn () => $product->delete()
        );
    }
}
