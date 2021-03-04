<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Validator;
use App\Macro\Kernel;
use App\Contracts\Macro\Database\BlueprintContract;
use App\Contracts\Macro\Validation\RuleContract;
use LogicException;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerDatabaseMacro();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootValidationMacro();
    }

    /**
     * Register database macro.
     * 
     * @return void
     */
    private function registerDatabaseMacro()
    {
        $this->registerBlueprintMacro();
    }

    /**
     * Register blueprint macro.
     * 
     * @return void
     */
    private function registerBlueprintMacro()
    {
        if (config('macro.database.blueprint.register')) {
            $blueprints = Kernel::$database['blueprints'];
            
            foreach ($blueprints as $methodName => $blueprint) {
                if ( ! (new $blueprint) instanceof BlueprintContract)
                    throw new LogicException(
                        'Blueprint :'.$blueprint.' must implements '.BlueprintContract::class
                    );

                Blueprint::macro(
                    $methodName,
                    call_user_func([
                        $blueprint,
                        BlueprintContract::MAIN_METHOD
                    ])
                );
            }
        }
    }

    /**
     * @return void
     */
    private function bootValidationMacro()
    {
        $this->bootRuleMacro();
    }

    /**
     * @return void
     */
    private function bootRuleMacro()
    {
        $rules = Kernel::$validation['rules'];

        foreach ($rules as $ruleName => $rule) {
            $ruleName = config('macro.validation.rule.prefix').$ruleName;

            if ( ! (new $rule) instanceof RuleContract)
                throw new LogicException('Rule: '.$rule.' must implements '.RuleContract::class);

            $ruleClassMethod = $rule.'@'.RuleContract::VALIDATE_METHOD;
            $replacerClassMethod = $rule.'@'.RuleContract::REPLACE_METHOD;

            Validator::extend($ruleName, $ruleClassMethod);
            Validator::replacer($ruleName, $replacerClassMethod);
        }
    }
}
