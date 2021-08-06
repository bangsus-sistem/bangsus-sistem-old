<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->after('unit_id', function ($table) {
                $table->unit('second_unit_id', true);
                $table->standarizedDecimal('second_ratio')->nullable();
                $table->unit('third_unit_id', true);
                $table->standarizedDecimal('third_ratio')->nullable();
                $table->unit('fourth_unit_id', true);
                $table->standarizedDecimal('fourth_ratio')->nullable();
                $table->unit('fifth_unit_id', true);
                $table->standarizedDecimal('fifth_ratio')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['second_unit_id']);
            $table->dropColumn('second_ratio');
            $table->dropForeign(['third_unit_id']);
            $table->dropColumn('third_ratio');
            $table->dropForeign(['fourth_unit_id']);
            $table->dropColumn('fourth_ratio');
            $table->dropForeign(['fifth_unit_id']);
            $table->dropColumn('fifth_ratio');
        });
    }
}
