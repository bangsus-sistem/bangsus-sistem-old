<?php

namespace App\Foundation\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Blueprint;
use App\Foundation\Macro\{
    MacroException,
    BlueprintContract,
    RuleContract,
};

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBlueprintMacros();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootRuleMacros();
    }

    /**
     * @throws \App\Foundation\Macro\MacroException
     * @return void
     */
    public function registerBlueprintMacros()
    {
        if ( ! config('foundation.macro.register.blueprints')) return;

        $kernel = config('foundation.macro.kernel');
        $blueprints = $kernel::$blueprints;

        foreach ($blueprints as $methodName => $blueprintClass) {
            $blueprint = new $blueprintClass;
            if ( ! $blueprint instanceof BlueprintContract) {
                $exception = new MacroException;
                $exception->problem('blueprint_has_no_contract', [
                    'methodName' => $methodName,
                    'blueprint' => $blueprintClass,
                ]);
                throw $exception;
            }
            Blueprint::macro(
                $methodName,
                call_user_func([
                    $blueprint,
                    BlueprintContract::MAIN_METHOD
                ])
            );
        }
    }

    /**
     * @return void
     */
    private function bootRuleMacros()
    {
        if ( ! config('foundation.macro.register.rules')) return;

        $kernel = config('foundation.macro.kernel');
        $rules = $kernel::$rules;

        foreach ($rules as $ruleName => $ruleClass) {
            $ruleName = config('foundation.macro.config.rule.prefix').'_'.$ruleName;

            $rule = new $ruleClass;
            if ( ! $rule instanceof BlueprintContract) {
                $exception = new MacroException;
                $exception->problem('rule_has_no_contract', [
                    'methodName' => $methodName,
                    'rule' => $ruleClass,
                ]);
                throw $exception;
            }

            $ruleClassMethod = $ruleClass.'@'.RuleContract::VALIDATE_METHOD;
            $replacerClassMethod = $ruleClass.'@'.RuleContract::REPLACE_METHOD;

            Validator::extend($ruleName, $ruleClassMethod);
            Validator::replacer($ruleName, $replacerClassMethod);
        }
    }
}
