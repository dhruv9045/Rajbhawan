<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
Use \Carbon\Carbon;

class SymptomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('symptoms', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('yearly_no')->unsigned();
            $table->foreign('yearly_no')->references('yearly_no')->on('personal')->onDelete('cascade');
            $table->date('date_of_visit')->default(Carbon::now());
            $table->string('disease');            
            $table->string('symptoms');
            $table->string('treatement');
            $table->string('remark');
            $table->rememberToken();
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
        Schema::dropIfExists('symptoms');
    }
}
