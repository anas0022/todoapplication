<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class todo extends Migration
{
    public function up()
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->text('todo_list');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('homes');
    }
}
