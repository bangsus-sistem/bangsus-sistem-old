<?php

namespace App\Macro\Validation\Rules\Database;

use App\Contracts\Macro\Validation\RuleContract;

class ExistsRule implements RuleContract
{
    /**
     * @param  string  $attribute
     * @param  mixed   $value
     * @param  array   $parameters
     * @param  \Illuminate\Validation\Validator  $validator
     * @return boolean
     */
    public function validate($attribute, $value, $parameters, $validator) : bool
    {
        $modelName = $parameters[0];
        $model = new $modelName;
        
        return ! is_null($model->find($value));
    }

    /**
     * @param  string  $message
     * @param  string  $attribute
     * @param  string  $rule
     * @param  array   $parameters
     * @return string
     */
    public function replace($message, $attribute, $rule, $parameters) : string
    {
        return $message;
    }
}
