<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();

            $table->string('first_name',128)->nullable();
            $table->string('last_name',128)->nullable();
            $table->string('phone',28)->nullable();
            $table->string('email',128)->nullable();
            $table->integer('desired_budget')->default(0);
            $table->string('message',1024)->nullable();
            $table->string('description',1024)->nullable();

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
        Schema::dropIfExists('customers');
    }
};
