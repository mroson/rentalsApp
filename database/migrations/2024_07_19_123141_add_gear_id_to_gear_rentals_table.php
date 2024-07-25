<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGearIdToGearRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gear_rentals', function (Blueprint $table) {
            $table->unsignedBigInteger('gear_id')->after('user_id'); // Agrega la columna gear_id

            // Define la clave foránea para gear_id
            $table->foreign('gear_id')->references('id')->on('gear_stocks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gear_rentals', function (Blueprint $table) {
            // Elimina la clave foránea
            $table->dropForeign(['gear_id']);
            
            // Elimina la columna gear_id
            $table->dropColumn('gear_id');
        });
    }
}
