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
        Schema::create('site_infos', function (Blueprint $table) {
            $table->id();
            $table->text('about',5000);
            $table->text('refund',5000);
            $table->text('privacy',5000);
            $table->text('purchase_guide',5000);
            $table->text('address',5000);
            $table->string('android_app_link');
            $table->string('ios_app_link');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->string('copyright_text');
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
        Schema::dropIfExists('site_infos');
    }
};
