<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMessage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_message', function (Blueprint $table) {
            $table->id('id_message');
            $table->foreignId('id_users_message')->references('id_users')->on(
                'table_users_message'
            );
            $table->text('content_message');
            $table->string('hash_message',100);
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
        Schema::dropIfExists('table_message');
    }
}
