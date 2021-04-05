<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class HiddenFlagScope implements Scope
{
    /**
     * List of the available extensions that would be autoloaded by the
     * extend method.
     * 
     * @var array
     */
    protected $extensions = ['WithHidden', 'WithoutHidden', 'OnlyHidden'];

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('hidden', false);
    }

    /**
     * Extending the builder.
     * 
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @return void
     */
    public function extend(Builder $builder)
    {
        foreach ($this->extensions as $extension) {
            $this->{"add{$extension}"}($builder);
        }
    }

    /**
     * Add the with-hidden extension to the builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @return void
     */
    protected function addWithHidden(Builder $builder)
    {
        $builder->macro('withHidden', function (Builder $builder, $withHidden = true) {
            if (! $withHidden) {
                return $builder->withoutHidden();
            }

            return $builder->withoutGlobalScope($this);
        });
    }

    /**
     * Add the without-hidden extension to the builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @return void
     */
    protected function addWithoutHidden(Builder $builder)
    {
        $builder->macro('withoutHidden', function (Builder $builder) {
            $model = $builder->getModel();

            $builder->withoutGlobalScope($this)->where('hidden', false);

            return $builder;
        });
    }

    /**
     * Add the only-hidden extension to the builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @return void
     */
    protected function addOnlyHidden(Builder $builder)
    {
        $builder->macro('onlyHidden', function (Builder $builder) {
            $model = $builder->getModel();

            $builder->withoutGlobalScope($this)->where('hidden', true);

            return $builder;
        });
    }
}
