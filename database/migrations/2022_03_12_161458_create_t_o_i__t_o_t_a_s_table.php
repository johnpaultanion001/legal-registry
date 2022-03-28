<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTOITOTASTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_o_i__t_o_t_a_s', function (Blueprint $table) {
            $table->id();
            $table->string('type_of_industry_id');
            $table->string('type_of_trade_act_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_o_i__t_o_t_a_s');
    }
}
