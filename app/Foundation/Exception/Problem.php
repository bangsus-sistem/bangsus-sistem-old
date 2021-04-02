<?php

namespace App\Foundation\Exception;

use Illuminate\Support\Str;

trait Problem
{
    /**
     * @param  mixed  $problem
     * @param  array  $replacers
     * @return void
     */
    public function problem($problem, $replacers = [])
    {
        $message = $this->messages[$problem];
        foreach ($replacers as $index => $replace) {
            $index = ':'.$index;
            $message = Str::replaceFirst($index, $replace, $message);
        }
        $this->message = $message;
    }
}
