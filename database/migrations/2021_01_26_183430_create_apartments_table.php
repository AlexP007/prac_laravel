<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->id();
            $table->enum('rooms', ['1', '2', '3', '4', '5', '>5'])->nullable(false);
            $table->float('meters', 7, 1)->nullable(false);
            $table->string('city', '512')->nullable(false);
            $table->string('address', '512')->nullable(false);
            $table->string('metro', '512');
            $table->unsignedBigInteger('price')->nullable(false);
            $table->text('about');
            $table->foreignId('user_id');

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
        Schema::table('apartments', function (Blueprint $table) {
            $table->dropForeign('user_id');
        });

        Schema::dropIfExists('apartments');
    }
}
