<?php

namespace App\Foundation\Http;

class AuthIdRequest extends AuthRequest
{
    /**
     * @final
     * @return array
     */
    final public function rules()
    {
        $rules = [
            'id' => [
                'required',
                config('foundation.macro.config.rule.prefix') .'_exists:' . $this->model,
            ],
        ];

        foreach ($this->additionalIdRules() as $idRule) {
            $rules['id'][] = $idRule;
        }

        foreach ($this->additionalRules() as $index => $rule) {
            $rules[$index] = $rule;
        }

        return $rules;
    }

    /**
     * @return array
     */
    public function additionalIdRules()
    {
        return [];
    }

    /**
     * @return array
     */
    public function additionalRules()
    {
        return [];
    }
}
