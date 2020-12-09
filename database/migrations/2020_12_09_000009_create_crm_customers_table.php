<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('crm_customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->longText('description')->nullable();
            $table->string('vehicle_reg')->nullable();
            $table->string('title')->nullable();
            $table->string('vehicle_make')->nullable();
            $table->string('salesperson')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('social_other')->nullable();
            $table->string('vehicle_model')->nullable();
            $table->string('vehicle_age')->nullable();
            $table->string('vehicle_colour')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->datetime('date_time')->nullable();
            $table->string('address_2')->nullable();
            $table->string('address_3')->nullable();
            $table->string('address_town')->nullable();
            $table->string('address_city')->nullable();
            $table->string('address_county')->nullable();
            $table->string('address_postcode')->nullable();
            $table->string('address_country')->nullable();
            $table->string('job_notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
