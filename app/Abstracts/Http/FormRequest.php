<?php

namespace App\Abstracts\Http;

use Illuminate\Foundation\Http\FormRequest as BaseFormRequest;

class FormRequest extends BaseFormRequest
{
    /**
     * Override the get validator instance to enable after validation
     * hook.
     * 
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance();
        $validator->after(fn ($validator) => $this->afterValidation($validator));
        return $validator;
    }

    /**
     * Master after validation method.
     * 
     * @return void
     */
    protected function afterValidation() {   }

    /**
     * @final
     * @param  string  $field
     * @return array
     */
    final protected function getBulk(string $field) : array
    {
        return $this->bulk()
            ?   $this->input($this->fieldNameToBulk($field))
            :   [$this->input($field)];
    }

    /**
     * @final
     * @param  string  $field
     * @return string
     */
    final protected function fieldNameToBulk(string $field) : string
    {
        return Str::pluralSnake($field);
    }
}
