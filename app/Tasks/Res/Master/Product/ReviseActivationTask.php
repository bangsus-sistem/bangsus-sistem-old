<?php

namespace App\Tasks\Res\Master\Product;

use Waffleboss\Foundation\Task;

class ReviseActivationTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $state
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request, $state = true)
    {
        $product = wbcm_model('master.product')::findOrFail(
            $request->input('id')
        );
        $this->transaction(
            function () use ($request, $product, $state) {
                $product->active = $state;
                $product->save();
            }
        );

        return $product;
    }
}
