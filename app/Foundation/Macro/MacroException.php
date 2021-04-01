<?php

namespace App\Foundation\Macro;

use Exception;
use Illuminate\Support\Str;

class MacroException extends Exception
{
    /**
     * @var array
     */
    private $messages = [
        'blueprint_has_no_contract' => 'Blueprint macro \':methodName\' of :blueprint must implements '.BlueprintContract::class,
    ];

    /**
     * @param  mixed  $problem
     * @param  array  $replacers
     * @return void
     */
    public function problem($problem, $replacers = [])
    {
        $message = $this->messages[$problem];
        foreach ($replacers as $index => $replace) {
            $index = ':' . $index;
            $message = Str::replaceFirst($index, $replace, $message);
        }
        $this->message = $message;
    }
}
