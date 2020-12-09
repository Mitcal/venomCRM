<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobTypesTable extends Migration
{
    public function up()
    {
        Schema::create('job_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->unique();
            $table->string('description')->nullable();
            $table->integer('category_number');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
