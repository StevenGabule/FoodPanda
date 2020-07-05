<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('slug');
            $table->string('short_description');
            $table->string('description');
            $table->tinyInteger('opening_day');
            $table->tinyInteger('closing_day');
            $table->time('opening_time');
            $table->time('closing_time');
            $table->text('address');
            $table->string('city');
            $table->string('postal_code');
            $table->string('avatar')->nullable();
            $table->boolean('status')->default(false);
            $table->string('owner')->nullable();
            $table->string('find_map')->nullable();
            $table->string('business_email')->unique();
            $table->string('contact_person');
            $table->string('contact_number');
            $table->string('telephone_number');
            $table->date('date_established');
            $table->softDeletes();
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
        Schema::dropIfExists('restaurants');
    }
}
