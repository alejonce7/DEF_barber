<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('client_lastname');
            $table->string('client_phone', 20);
            $table->foreignId('barber_id')->constrained('users');
            $table->foreignId('service_id')->constrained('servicios');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->enum('status', ['scheduled', 'completed', 'canceled'])->default('scheduled');
            $table->boolean('is_early_late')->default(false)->comment('Cita fuera de horario laboral');
            $table->decimal('prepayment_amount', 10, 2)->default(0);
            $table->boolean('prepayment_status')->default(false);
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
        Schema::dropIfExists('citas');
    }
}
