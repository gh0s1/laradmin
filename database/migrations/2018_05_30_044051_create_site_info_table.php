<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string("site_name")->nullable();
            $table->string("site_url")->nullable();
            $table->string("site_title")->nullable();
            $table->text("keywords")->nullable();
            $table->text("description")->nullable();
            $table->integer("created_at")->nullable();
            $table->integer("updated_at")->nullable();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('site_info');
    }
}
