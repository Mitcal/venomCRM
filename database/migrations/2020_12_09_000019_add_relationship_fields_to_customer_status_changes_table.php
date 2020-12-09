<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCustomerStatusChangesTable extends Migration
{
    public function up()
    {
        Schema::table('customer_status_changes', function (Blueprint $table) {
            $table->unsignedBigInteger('old_status_id');
            $table->foreign('old_status_id', 'old_status_fk_2763644')->references('id')->on('crm_statuses');
            $table->unsignedBigInteger('new_status_id');
            $table->foreign('new_status_id', 'new_status_fk_2763645')->references('id')->on('crm_statuses');
        });
    }
}
