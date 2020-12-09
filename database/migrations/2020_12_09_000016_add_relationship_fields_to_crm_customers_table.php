<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCrmCustomersTable extends Migration
{
    public function up()
    {
        Schema::table('crm_customers', function (Blueprint $table) {
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id', 'status_fk_2682230')->references('id')->on('crm_statuses');
            $table->unsignedBigInteger('market_segment_id')->nullable();
            $table->foreign('market_segment_id', 'market_segment_fk_2682338')->references('id')->on('market_segments');
            $table->unsignedBigInteger('job_type_id')->nullable();
            $table->foreign('job_type_id', 'job_type_fk_2682352')->references('id')->on('job_types');
            $table->unsignedBigInteger('lead_source_id')->nullable();
            $table->foreign('lead_source_id', 'lead_source_fk_2718159')->references('id')->on('lead_sources');
        });
    }
}
