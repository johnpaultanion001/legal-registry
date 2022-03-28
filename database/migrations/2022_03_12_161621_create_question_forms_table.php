<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_forms', function (Blueprint $table) {
            $table->id();
            $table->string('client_id');
            $table->string('title_of_law_id');
            $table->string('applicability')->nullable();
            $table->string('iywd')->nullable();
            $table->string('compliance_status')->nullable();
            $table->longText('remarks')->nullable();
            $table->longText('file_remarks')->nullable();
            $table->string('rpdhn')->nullable();


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
        Schema::dropIfExists('question_forms');
    }
}
