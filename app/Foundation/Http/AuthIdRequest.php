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
                'bsb_exists:' . $this->model,
            ],
        ];

        foreach ($this->additionalIdRules() as $idRule) {
            $rules['id'][] = $idRule;
        }

        foreach ($this->additionalRules() as $rule) {
            $rules[] = $rule;
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
