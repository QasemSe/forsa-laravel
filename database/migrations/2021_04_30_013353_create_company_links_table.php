<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_links', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned()->nullable();
            $table->text('facebook_url')->nullable();
            $table->text('twitter_url')->nullable();
            $table->text('whatsapp_url')->nullable();
            $table->text('instagram_url')->nullable();
            $table->text('linkedin_url')->nullable();
            $table->text('behance_url')->nullable();
            $table->text('website_url')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_links');
    }
}
