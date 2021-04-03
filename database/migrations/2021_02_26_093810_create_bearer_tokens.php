<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBearerTokens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bearer_tokens', function (Blueprint $table) {
            $table->id();
            $table->entryPoint();
            $table->token(50);
            $table->userDelete();
            $table->timestamps();
            $table->expiredAt();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bearer_tokens');
    }
}
